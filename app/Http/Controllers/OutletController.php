<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutletRequest;
use App\Http\Resources\ModelResource;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Outlet;
use App\Models\Plan;

class OutletController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Outlet::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Outlet::with('outlet','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(OutletRequest $request)
    {


        $allow = false;

        $brand = Brand::find($request->brand_id);
        if (!is_object($brand)) {
            {
                return response([
                    'message' => trans('main.null_entity'),
                ], 422);
            }
        }

        $company = Company::find($brand->company_id);
        if (!is_object($company)) {
            {
                return response([
                    'message' => trans('main.null_entity'),
                ], 422);
            }
        }


        $brand_id_array = [];
        $brands = Brand::where('company_id', $company->id)->get();
        foreach ($brands as $brand) {
            array_push($brand_id_array, $brand->id);
        }
        $outlets = Outlet::whereIn('brand_id', $brand_id_array)->get();
        $outlet_max = Plan::select('plans.outlet_max')->where('id', $company->plan_id)->first();
        $numer_existing_outlets = count($outlets);

        if ($outlet_max->outlet_max == 'unlimited') {
            $allow = true;
        } else {
            $numer_of_max_outlets = (int)$outlet_max->outlet_max;

            $available = $numer_of_max_outlets - $numer_existing_outlets;

            if ($available > 0) {

                $allow = true;
            } else {

                $allow = false;
            }
        }

        if ($allow) {
            $outlet = new Outlet;
            $outlet->fill($request->all());
            $outlet->created_by_user_id = $request->user()->id;
            $outlet->save();

            return new ModelResource($outlet);
        } else {
            return response([
                'message' => trans('main.check_your_plan'),
            ], 200);
        }

    }


    public function show($id)
    {

        $Outlet = Outlet::with('brand', 'cart', 'order')->find($id);

        if ($Outlet === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($Outlet);
    }


    public function update(OutletRequest $request, $id)
    {
        $outlet = Outlet::find($id);
        if ($outlet === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $outlet->update($request->all());
        $outlet->updated_by_user_id = $request->user()->id;
        $outlet->save();

        return new ModelResource($outlet);
    }


    public function destroy($id)
    {
        $outlet = Outlet::find($id);
        if ($outlet === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $outlet->delete();

        return response()->json([
            'status' => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }
}
