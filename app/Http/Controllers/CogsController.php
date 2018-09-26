<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Company;
use App\Models\Order;
use App\Models\Outlet;

class CogsController extends Controller
{

    public function __construct()
    {

    }


    public function TotalOrders($id)
    {
        $company_id = $id;

        if ( ! Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        $brand_id_array  = [];
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


    public function TotalPurchases($id)
    {

        $company_id = $id;

        if ( ! Company::find($id)) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return response()->json([
            'Company Total Purchases' => "",
        ]);
    }


}
