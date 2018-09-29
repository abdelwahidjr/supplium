<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\ModelResource;
use App\Models\Category;

class CategoryController extends Controller
{


    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Category::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Category::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->fill($request->all());
        $category->created_by_user_id = $request->user()->id;
        $category->save();

        return new ModelResource($category);
    }


    public function show($id)
    {
        $category = Category::with('product')->find($id);

        if ($category === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($category);
    }


    public function update(CategoryRequest $request , $id)
    {
        $category = Category::find($id);
        if ($category === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $category->update($request->all());
        $category->updated_by_user_id = $request->user()->id;
        $category->save();

        return new ModelResource($category);
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $category->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }
}
