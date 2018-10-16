<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ModelResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function __construct()
    {
        /*  $user=Auth::user();

          //$user->hasRole('writer'); will return true or false
          //test
          $this->middleware('auth');
          $this->middleware('log')->only('index');
          $this->middleware('subscribed')->except('store');*/

    }


    public function all()//only admin
    {
        // all
        return ModelResource::collection(Product::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Product::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function SortProducts($type , $order)
    {
        $types  = ['asc' , 'desc'];
        $orders = ['name' , 'price' , 'sku'];

        if ( ! in_array($type , $types))
        {
            return response([
                'message' => 'Invalid sort type , available types are [ asc , desc ].' ,
            ] , 200);
        } else
        {
            if ( ! in_array($order , $orders))
            {
                return response([
                    'message' => 'Invalid order by type , available types are [ name , price , sku ].' ,
                ] , 200);
            }
        }
        $products = Product::with('category' , 'supplier' , 'order' , 'cart')->orderBy($order , $type)
            ->paginate(config('main.JsonResultCount'))->all();

        return new ModelResource($products);
    }


    public function store(ProductRequest $request)//admin,manager,owner
    {
        $product = new Product;
        $product->fill($request->all());
        $product->created_by_user_id = $request->user()->id;
        $product->save();

        return new ModelResource($product);
    }


    public function show($id)
    {
        $product = Product::with('supplier' , 'category' , 'order' , 'cart')->find($id);

        if ($product === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($product);
    }


    public function update(ProductRequest $request , $id)
    {
        $product = Product::find($id);
        if ($product === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $product->update($request->all());
        $product->updated_by_user_id = $request->user()->id;
        $product->save();

        $cart_ids = [];

        foreach ($product->cart as $k => $v)
        {
            $cart_ids[$k] = $v['id'];
        }

        $product->cart()->sync($cart_ids);

        return new ModelResource($product);
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        $cart_ids = [];

        foreach ($product->cart as $k => $v)
        {
            $cart_ids[$k] = $v['id'];
        }

        $product->cart()->detach($cart_ids);

        $product->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }


    public function directory(DirectoryRequest $request)
    {
        //file columns ['sku','name','unit','price','supplier_email','category_name']

        $path = $request->file->getRealPath();
        $data = Excel::load($path , function ($reader)
        {
        })->get();

        if ( ! empty($data) && $data->count())
        {

            foreach ($data as $key => $value)
            {

                $product  = Product::where('sku' , $value->sku)->first();
                $supplier = Supplier::where('email' , $value->supplier_email)->first();
                $category = Category::where('name' , $value->category_name)->first();

                if ($product)
                {
                    return response([
                        'message'       => "file columns ['sku','name','unit','price','supplier_email','category_name']" ,
                        'message:error' => $value->sku . " product already exists" ,
                    ] , 422);

                }

                if ( ! $supplier)
                {
                    return response([
                        'message'       => "file columns ['sku','name','unit','price','supplier_email','category_name']" ,
                        'message:error' => $value->supplier_email . " supplier not found" ,
                    ] , 422);

                }

                if ( ! $category)
                {
                    return response([
                        'message'       => "file columns ['sku','name','unit','price','supplier_email','category_name']" ,
                        'message:error' => $value->category_name . " category not found" ,
                    ] , 422);

                }

                $insert[] = [
                    'sku'              => $value->sku ,
                    'name'             => $value->name ,
                    'unit'             => $value->unit ,
                    'price'            => $value->price ,
                    'supplier_id'      => $supplier->id ,
                    'category_id'      => $category->id ,
                ];
            }

            if ( ! empty($insert))
            {
                DB::table('products')->insert($insert);

                return response([
                    'message:success' => "file data saved!" ,
                ] , 422);

            } else
            {
                return response([
                    'message'       => "file columns ['sku','name','unit','price','supplier_email','category_name']" ,
                    'message:error' => "file data not saved!, please check the file data" ,
                ] , 422);
            }


        }

        return response([
            'message'       => "file columns ['sku','name','unit','price','supplier_email','category_name']" ,
            'message:error' => "empty data" ,
        ] , 422);
    }


}
