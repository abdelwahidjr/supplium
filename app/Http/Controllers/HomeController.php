<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandSupplier;
use App\Models\Company;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\User;
use App\Notifications\OrderConfirmation;
use App\Notifications\SupplierHaveOrder;
use Illuminate\Support\Facades\Auth;
use Notification;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function home()
    {
        $order_count     = 0;
        $total_purchases = 0;
        $total_items     = 0;
        $total_suppliers = 0;

        $company_id = Auth::user()->company->id;
        $company    = Company::find($company_id);
        if ($company != null)
        {
            $brand_id_array  = [];
            $outlet_id_array = [];
            $brands          = Brand::where('company_id' , $company_id)->get();

            foreach ($brands as $brand)
            {
                array_push($brand_id_array , $brand->id);
            }

            $outlets = Outlet::whereIn('brand_id' , $brand_id_array)->get();

            foreach ($outlets as $outlet)
            {
                array_push($outlet_id_array , $outlet->id);
            }

            $order_count       = Order::whereIn('outlet_id' , $outlet_id_array)->count();
            $total_purchases   = Order::whereIn('outlet_id' , $outlet_id_array)->sum('total_price_after_tax');
            $total_items       = Order::whereIn('outlet_id' , $outlet_id_array)->where('status' , 'confirmed')->sum('total_qty');
            $supplier_id_array = BrandSupplier::select('supplier_id')->whereIn('brand_id' , $brand_id_array)->get();
            $total_suppliers   = count($supplier_id_array);
            $previous_orders   = Order::with('supplier')->whereIn('outlet_id' , $outlet_id_array)->get();

        }



        return view('dashboard.dashboard', [
            'previous_orders' => $previous_orders ,
            'order_count'     => $order_count ,
            'total_purchases' => $total_purchases ,
            'total_items'     => $total_items ,
            'total_suppliers' => $total_suppliers ,
        ]);
    }

    public function test()
    {

        //return view('mail.order.supplier_new_order');

        $user     = User::find('2');
        $order    = Order::find('50');
        $supplier = $order->supplier;

        Notification::send($user , (new OrderConfirmation($order)));
        Notification::send($supplier , (new SupplierHaveOrder()));

    }
}
