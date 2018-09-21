<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\ModelResource;
use App\Models\Brand;

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
        $brand = new Brand;
        $brand->fill($request->all());
        $brand->created_by_user_id = $request->user()->id;
        $brand->save();

        return new ModelResource($brand);
    }


    public function show($id)
    {

        $Brand = Brand::with('comapny', 'outlet', 'supplier')->find($id);

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
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }

}
