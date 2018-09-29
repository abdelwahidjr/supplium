<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandSupplier;
use App\Models\Company;
use App\Models\Order;
use App\Models\Outlet;

class OrderHistoryController extends Controller
{

    public function __construct()
    {

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
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


}
