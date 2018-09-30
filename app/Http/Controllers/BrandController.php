<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\ModelResource;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Plan;

class BrandController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Brand::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Brand::with('brand','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(BrandRequest $request)
    {


        $allow = false;

        $company = Company::find($request->company_id);
        if (!is_object($company)) {
            {
                return response([
                    'message' => trans('main.null_entity'),
                ], 422);
            }
        }

        $brands = Brand::where('company_id', $request->company_id)->get();
        $brand_max = Plan::select('plans.brand_max')->where('id', $company->plan_id)->first();
        $numer_existing_brands = count($brands);
        if ($brand_max->brand_max == 'unlimited') {
            $allow = true;
        } else {
            $numer_of_max_brands = (int)$brand_max->brand_max;

            $available = $numer_of_max_brands - $numer_existing_brands;

            if ($available > 0) {

                $allow = true;
            } else {

                $allow = false;
            }
        }
        if ($allow) {
            $brand = new Brand;
            $brand->fill($request->all());
            $brand->created_by_user_id = $request->user()->id;
            $brand->save();
            return new ModelResource($brand);
        } else {
            return response([
                'message' => trans('main.check_your_plan'),
            ], 200);
        }
    }


    public function show($id)
    {

        $Brand = Brand::with('company', 'outlet', 'supplier')->find($id);

        if ($Brand === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($Brand);
    }


    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        if ($brand === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $brand->update($request->all());
        $brand->updated_by_user_id = $request->user()->id;
        $brand->save();

        return new ModelResource($brand);
    }


    public function destroy($id)
    {
        $brand = Brand::find($id);
        if ($brand === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $brand->delete();

        return response()->json([
            'status' => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }

}
