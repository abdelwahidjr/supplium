<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandSupplier;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\Supplier;

class CogsController extends Controller
{

    public function __construct()
    {

    }

    // TotalOrders
    public function TotalOrders($id)
    {
        $company_id = $id;

        if (!Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        $brand_id_array = [];
        $outlet_id_array = [];

        $brands = Brand::where('company_id', $company_id)->get();

        foreach ($brands as $brand) {
            array_push($brand_id_array, $brand->id);
        }

        $outlets = Outlet::whereIn('brand_id', $brand_id_array)->get();

        foreach ($outlets as $outlet) {
            array_push($outlet_id_array, $outlet->id);
        }

        $order_count = Order::whereIn('outlet_id', $outlet_id_array)->count();

        return response()->json([
            'Company Total Orders' => $order_count,
        ]);

    }


    /**
     * TotalPurchases
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function TotalPurchases($id)
    {

        $company_id = $id;

        if (!Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }


        $brand_id_array = [];
        $outlet_id_array = [];


        $brands = Brand::where('company_id', $company_id)->get();

        foreach ($brands as $brand) {
            array_push($brand_id_array, $brand->id);
        }

        $outlets = Outlet::whereIn('brand_id', $brand_id_array)->get();

        foreach ($outlets as $outlet) {
            array_push($outlet_id_array, $outlet->id);
        }


        $total = Order::whereIn('outlet_id', $outlet_id_array)->sum('total_price_after_tax');


        return response()->json([
            'Company Total Purchases' => $total,
        ]);


    }


    /**
     * TotalSupliers
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function TotalSupliers($id)
    {

        $company_id = $id;

        if (!Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }


        $brand_id_array = [];

        $brands = Brand::where('company_id', $company_id)->get();

        foreach ($brands as $brand) {
            array_push($brand_id_array, $brand->id);
        }

        $supplier_id_array = BrandSupplier::select('supplier_id')->whereIn('brand_id', $brand_id_array)->get();
        $total = count($supplier_id_array);


        return response()->json([
            'Company Total Suppliers' => $total,
        ]);
    }


    /**
     * TotalItems
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function TotalItems($id)
    {

        $company_id = $id;

        if (!Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }



        $brand_id_array = [];
        $outlet_id_array = [];


        $brands = Brand::where('company_id', $company_id)->get();

        foreach ($brands as $brand) {
            array_push($brand_id_array, $brand->id);
        }

        $outlets = Outlet::whereIn('brand_id', $brand_id_array)->get();

        foreach ($outlets as $outlet) {
            array_push($outlet_id_array, $outlet->id);
        }


        //to get total quantity (confirmed or pending)
        //$total=Order::whereIn('outlet_id',$outlet_id_array)->sum('total_qty');

        //to get total quantity (confirmed only)
        $total = Order::whereIn('outlet_id', $outlet_id_array)->where('status', 'confirmed')->sum('total_qty');


        return response()->json([
            'Company Total Confirmed Items' => $total,
        ]);


    }


    /**
     * TotalSuplierPurchases
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function TopSuplierPurchases($id)
    {

        $company_id = $id;

        if (!Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }


        $brand_id_array = [];
        $outlet_id_array = [];


        $brands = Brand::where('company_id', $company_id)->get();

        foreach ($brands as $brand) {
            array_push($brand_id_array, $brand->id);
        }

        $outlets = Outlet::whereIn('brand_id', $brand_id_array)->get();

        foreach ($outlets as $outlet) {
            array_push($outlet_id_array, $outlet->id);
        }


        $supplier_id_array = BrandSupplier::select('supplier_id')->whereIn('brand_id', $brand_id_array)->get();
        $order_supplier_id = [];

        foreach ($supplier_id_array as $supplier_id) {

            array_push($order_supplier_id, $supplier_id->supplier_id);
        }


        $total_supplier_purchases = [];

        for ($i = 0; $i < count($supplier_id_array); $i++) {
            $supplier_name = Supplier::select('name')->where('id', $supplier_id_array[$i]->supplier_id)->first();
            $supplier_purchases_sum = Order::where('supplier_id', $supplier_id_array[$i]->supplier_id)->whereIn('outlet_id', $outlet_id_array)->sum('total_price_after_tax');

            $item['name'] = $supplier_name->name;
            $item['sum'] = $supplier_purchases_sum;

            array_push($total_supplier_purchases, $item);

        }

        //to sort array of suppliers depending on puerchases from max to min
        array_multisort(array_column($total_supplier_purchases, 'sum'), SORT_DESC, $total_supplier_purchases);


        return response()->json([
            'Top Supplier Purchases' => $total_supplier_purchases
        ]);

        //if you need to see outlets ids and suppliers_ids

        /*  return response()->json([
              'outlets' => $outlet_id_array,
              'suppliers' => $order_supplier_id,
              'final_arr' => $final_arr
          ]);*/


    }


    /**
     * PurchasesOverTime
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     *
     */
    public function PurchasesOverTime($id)
    {

        $company_id = $id;

        if (!Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        $final_result_arr = [];

        for ($i = 0; $i > -3; $i--) {

            $total_amount_of_month = Invoice::whereMonth('invoices.created_at', date('m', strtotime(strval($i) . ' month')))->where('invoices.company_id', $company_id)->sum('invoices.amount');
            $orders = Invoice::select('invoices.amount', 'orders.created_at', 'orders.status', 'orders.deliverd_status')->join('orders', 'invoices.order_id', '=', 'orders.id')->whereMonth('invoices.created_at', date('m', strtotime(strval($i) . ' month')))->where('invoices.company_id', $company_id)->get();

            $month['month'] = date('M', strtotime(strval($i) . ' month'));
            $month['total_amount'] = $total_amount_of_month;
            $month['orders'] = $orders;
            array_push($final_result_arr, $month);


        }


        return response()->json([
            'Purchases Over Time' => $final_result_arr
        ]);


    }


    /**
     * PurchasesbySupplier
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function PurchasesBySupplier($id)
    {

        $company_id = $id;

        if (!Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }


        $brand_id_array = [];
        $outlet_id_array = [];


        $brands = Brand::where('company_id', $company_id)->get();

        foreach ($brands as $brand) {
            array_push($brand_id_array, $brand->id);
        }

        $outlets = Outlet::whereIn('brand_id', $brand_id_array)->get();

        foreach ($outlets as $outlet) {
            array_push($outlet_id_array, $outlet->id);
        }


        $supplier_id_array = BrandSupplier::select('supplier_id')->whereIn('brand_id', $brand_id_array)->get();
        $order_supplier_id = [];

        foreach ($supplier_id_array as $supplier_id) {

            array_push($order_supplier_id, $supplier_id->supplier_id);
        }


        $total_supplier_purchases = [];

        for ($i = 0; $i < count($supplier_id_array); $i++) {
            $supplier_name = Supplier::select('name')->where('id', $supplier_id_array[$i]->supplier_id)->first();
            $supplier_purchases_sum = Order::where('supplier_id', $supplier_id_array[$i]->supplier_id)->whereIn('outlet_id', $outlet_id_array)->sum('total_price_after_tax');

            $item['name'] = $supplier_name->name;
            $item['sum'] = $supplier_purchases_sum;

            array_push($total_supplier_purchases, $item);

        }

        //to sort array of suppliers depending on puerchases from max to min
        //array_multisort(array_column($total_supplier_purchases, 'sum'), SORT_DESC, $total_supplier_purchases);


        return response()->json([
            'Purchases by Supplier' => $total_supplier_purchases
        ]);

        //if you need to see outlets ids and suppliers_ids

        /*  return response()->json([
              'outlets' => $outlet_id_array,
              'suppliers' => $order_supplier_id,
              'final_arr' => $final_arr
          ]);*/


    }


    /**
     * TopProductPurchases
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function TopProductPurchases($id)
    {

        $company_id = $id;

        if (!Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }


        $brand_id_array = [];
        $outlet_id_array = [];


        $brands = Brand::where('company_id', $company_id)->get();

        foreach ($brands as $brand) {
            array_push($brand_id_array, $brand->id);
        }

        $outlets = Outlet::whereIn('brand_id', $brand_id_array)->get();

        foreach ($outlets as $outlet) {
            array_push($outlet_id_array, $outlet->id);
        }


        $products = Order::select('products')->whereIn('outlet_id', $outlet_id_array)->where('status', 'pending')->get();

        $products_arr_before_count_accurrences = [];
        $repositroy = [];
        for ($i = 0; $i < count($products); $i++) {

            for ($x = 0; $x < count($products[$i]->products); $x++) {
                array_push($products_arr_before_count_accurrences, $products[$i]->products[$x]);
            }
        }


        foreach ($products_arr_before_count_accurrences as $product) {
            $item['id'] = $product['id'];
            $item['qty'] = $product['qty'];
            $item['total'] = $product['price'] * $product['qty'];


            array_push($repositroy, $item);
        }

        $filtered_repositroy = [];
        for ($u = 0; $u < count($repositroy); $u++) {


            if (count($filtered_repositroy)>0)
            {
                $found_flag = false;



                for ($t = 0; $t < count($filtered_repositroy); $t++) {
                    if (!$found_flag) {
                        if ($repositroy[$u]['id'] === $filtered_repositroy[$t]['id']) {
                            $found_flag = true;
                            $filtered_repositroy[$t]['total']+=$repositroy[$u]['total'];
                        }

                    }

                }

                if (!$found_flag) {
                    array_push($filtered_repositroy, $repositroy[$u]);

                }
            }else{
                array_push($filtered_repositroy, $repositroy[$u]);

            }




        }




        //to sort array of products depending on puerchases from max to min
        array_multisort(array_column($filtered_repositroy, 'total'), SORT_DESC, $filtered_repositroy);



        return response()->json([
            'Purchases by Supplier' => $filtered_repositroy
        ]);

    }


}
