<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchByDateAndCompanyRequest;
use App\Http\Requests\SearchByDateRequest;
use App\Http\Requests\UserFindByMail;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\User;

class SearchController extends Controller
{

    public function __construct()
    {

    }

    /**
     * SearchOrdersByCompany
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function SearchOrdersByCompany($id)
    {
        if ( ! Company::find($id))
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $orders = Company::with('brand.outlet.order')->where('id' , $id)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Company Orders' => $orders ,
        ]);
    }

    /**
     * SearchSuppliersByCompany
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function SearchSuppliersByCompany($id)
    {
        if ( ! Company::find($id))
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $orders = Company::with('supplier.product.category')->where('id' , $id)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Company Suppliers' => $orders ,
        ]);
    }

    /**
     * SearchOrdersByBrand
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function SearchOrdersByBrand($id)
    {
        if ( ! Brand::find($id))
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $orders = Brand::with('outlet.order')->where('id' , $id)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Brand Orders' => $orders ,
        ]);
    }

    /**
     * SearchSuppliersByBrand
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function SearchSuppliersByBrand($id)
    {
        if ( ! Brand::find($id))
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $orders = Brand::with('supplier.product.category')->where('id' , $id)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Brand Suppliers' => $orders ,
        ]);
    }

    /**
     * SearchOrdersByOutlet
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function SearchOrdersByOutlet($id)
    {
        if ( ! Outlet::find($id))
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $orders = Outlet::with('order')->where('id' , $id)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Outlet Orders' => $orders ,
        ]);
    }

    /**
     * SearchSuppliersByOutlet
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function SearchSuppliersByOutlet($id)
    {
        if ( ! Outlet::find($id))
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $orders = Outlet::with('brand.supplier.product.category')->where('id' , $id)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Outlet Suppliers' => $orders ,
        ]);
    }

    /**
     * SearchUsersByEmail
     *
     * @param UserFindByMail $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function SearchUsersByEmail(UserFindByMail $request)
    {
        $email = $request->email;
        $user  = User::with('company')->with('company.brand')->where('email' , $email)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'User' => $user ,
        ]);
    }

    /**
     * SearchInvoicesByCompanyAndDate
     *
     * @param SearchByDateAndCompanyRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function SearchInvoicesByCompanyAndDate(SearchByDateAndCompanyRequest $request)
    {
        $start_date = $request->start_date;
        $end_date   = $request->end_date;
        $company_id = $request->company_id;
        $invoices   = Invoice::with('order')->where('company_id' , $company_id)->whereDate('invoices.created_at' , '>=' , $start_date)
            ->whereDate('invoices.created_at' , '<=' , $end_date)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Invoices' => $invoices ,
        ]);

    }

    /**
     * SearchInvoicesByDate
     *
     * @param SearchByDateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function SearchInvoicesByDate(SearchByDateRequest $request)
    {
        $start_date = $request->start_date;
        $end_date   = $request->end_date;

        $invoices = Invoice::with('order')->whereDate('invoices.created_at' , '>=' , $start_date)
            ->whereDate('invoices.created_at' , '<=' , $end_date)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Invoices' => $invoices ,
        ]);
    }

    /**
     * SearchOrdersByCompanyAndDate
     *
     * @param SearchByDateAndCompanyRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function SearchOrdersByCompanyAndDate(SearchByDateAndCompanyRequest $request)
    {
        $start_date      = $request->start_date;
        $end_date        = $request->end_date;
        $company_id      = $request->company_id;
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
        $orders = Order::whereIn('outlet_id' , $outlet_id_array)->whereDate('orders.created_at' , '>=' , $start_date)
            ->whereDate('orders.created_at' , '<=' , $end_date)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Orders' => $orders ,
        ]);
    }

    /**
     * SearchOrdersByDate
     *
     * @param SearchByDateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function SearchOrdersByDate(SearchByDateRequest $request)
    {
        $start_date = $request->start_date;
        $end_date   = $request->end_date;
        $orders     = Order::whereDate('orders.created_at' , '>=' , $start_date)
            ->whereDate('orders.created_at' , '<=' , $end_date)->paginate(config('main.JsonResultCount'))->all();

        return response()->json([
            'Orders' => $orders ,
        ]);
    }
}
