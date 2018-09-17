<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ModelResource;
use App\Models\Product;

class ProductController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Product::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Product::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->fill($request->all());
        $product->created_by_user_id = $request->user()->id;
        $product->save();

        return new ModelResource($product);
    }


    public function show($id)
    {
        $product = Product::with('supplier', 'category')->find($id);

        if ($product === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($product);
    }


    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if ($product === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $product->update($request->all());
        $product->updated_by_user_id = $request->user()->id;
        $product->save();

        return new ModelResource($product);
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $product->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }

}
