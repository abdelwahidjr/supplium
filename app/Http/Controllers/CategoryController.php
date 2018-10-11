<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateSupplierDirectoryRequest;
use App\Http\Resources\ModelResource;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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


    public function SortCategories($type)
    {
        $types=['asc','desc'];
        if (!in_array($type, $types)) {
            return response([
                'message' => 'Invalid sort type , available types are [ asc , desc ].',
            ], 200);
        }
        $categories=Category::with('product')->orderBy('name', $type)
            ->paginate(config('main.JsonResultCount'))->all();
        return new ModelResource($categories);
    }

    public function store(CategoryRequest $request)
    {

        $extension = $request->image_url->getClientOriginalExtension();
        $sha1 = sha1($request->image_url->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s') . "_" . $sha1;
        Storage::disk('categories')->put($filename . "." . $extension, File::get($request->image_url));


        $category = new Category();
        $category->name = $request->name;
        $category->image_url = 'storage/images/categories/' . $filename . "." . $extension;
        $category->created_by_user_id = $request->user()->id;
        $category->save();

        return new ModelResource($category);
    }


    public function show($id)
    {
        $category = Category::with('product')->find($id);

        if ($category === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($category);
    }


    public function update(UpdateSupplierDirectoryRequest $request, $id)
    {
        $category = Category::find($id);
        if ($category === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        if ($request->name != null) {
            if (Category::where('id', '!=', $id)->where('name', $request->name)->exists()) {
                return response([
                    'message' => 'This category name is already taken !',
                ], 200);
            } else {
                $category->name = $request->name;
            }

        }

        //if user update image
        if ($request->image_url != null) {
            $extension = $request->image_url->getClientOriginalExtension();
            $sha1 = sha1($request->image_url->getClientOriginalName());
            $filename = date('Y-m-d-h-i-s') . "_" . $sha1;
            Storage::disk('categories')->put($filename . "." . $extension, File::get($request->image_url));
            //put your base url to retrieve images
            $category->image_url = 'storage/images/categories/' . $filename . "." . $extension;
        }


        // $category->update($request->all());
        $category->updated_by_user_id = $request->user()->id;
        $category->save();

        return new ModelResource($category);
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $category->delete();

        return response()->json([
            'status' => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }
}
