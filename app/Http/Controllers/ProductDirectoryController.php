<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDirectoryRequest;
use App\Http\Requests\StoreProductDirectoryRequest;
use App\Http\Requests\UpdateProductDirectoryRequest;
use App\Http\Resources\ModelResource;
use App\Models\ProductDirectory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return ModelResource::collection(ProductDirectory::paginate(config('main.JsonResultCount')));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductDirectoryRequest $request)
    {

        $productDirectory                     = new ProductDirectory();
        $productDirectory->segment            = $request->segment;
        $productDirectory->category           = $request->category;
        $productDirectory->sub_category       = $request->sub_category;
        $productDirectory->supplier           = $request->supplier;
        $productDirectory->brand              = $request->brand;
        $productDirectory->sku                = $request->sku;
        $productDirectory->describtion        = $request->describtion;
        $productDirectory->type               = $request->type;
        $productDirectory->quantity           = $request->quantity;
        $productDirectory->unit_price         = $request->unit_price;
        $productDirectory->weight             = $request->weight;
        $productDirectory->unit               = $request->unit;
        $productDirectory->case_price         = $request->case_price;
        $productDirectory->origin             = $request->origin;
        $productDirectory->unit_of_sale       = $request->unit_of_sale;
        $productDirectory->created_by_user_id = $request->user()->id;
        $productDirectory->save();

        return new ModelResource($productDirectory);
    }


    /**
     * @param $id
     *
     * @return ModelResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_directory = ProductDirectory::find($id);
        if ($product_directory === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($product_directory);

    }

    /**
     * @param UpdateProductDirectoryRequest $request
     * @param                               $id
     *
     * @return ModelResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(UpdateProductDirectoryRequest $request , $id)
    {

        $product_directory = ProductDirectory::find($id);
        if ($product_directory === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        if ($request->sku != null)
        {
            if (ProductDirectory::where('id' , '!=' , $id)->where('sku' , $request->sku)->exists())
            {
                return response([
                    'message' => 'This sku is already taken !' ,
                ] , 200);
            } else
            {
                $product_directory->sku = $request->sku;
            }

        }

        $product_directory->update($request->all());
        $product_directory->updated_by_user_id = $request->user()->id;
        $product_directory->save();

        return new ModelResource($product_directory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierDirectory $supplierDirectory
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_directory = ProductDirectory::find($id);
        if ($product_directory === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        $product_directory->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }

    /**
     * @param SupplierDirectoryRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function directory(ProductDirectoryRequest $request)
    {
        $error_messages = [];
        $path           = $request->file->getRealPath();
        $data           = Excel::load($path , function ($reader)
        {
        })->get();

        if ( ! empty($data) && $data->count())
        {
            foreach ($data as $key => $value)
            {
                /*                dump($value);*/

                if (ProductDirectory::where('sku' , $value->sku)->exists())
                {
                    array_push($error_messages , 'This sku ' . $value->sku . ' is already taken !');

                } else
                {

                    $insert[] = [
                        'segment'      => $value->segment ,
                        'category'     => $value->category ,
                        'sub_category' => $value->sub_category ,
                        'supplier'     => $value->supplier ,
                        'brand'        => $value->brand ,
                        'sku'          => $value->sku ,
                        'describtion'  => $value->item_description ,
                        'type'         => $value->alsnf ,
                        'quantity'     => $value->qty ,
                        'unit_price'   => $value->unit_price ,
                        'weight'       => $value->weight ,
                        'unit'         => $value->unit ,
                        'case_price'   => $value->case_price ,
                        'origin'       => $value->origin ,
                        'unit_of_sale' => $value->unit_of_sale ,
                    ];
                }
            }

            if ( ! empty($insert))
            {
                DB::table('product_directories')->insert($insert);

                return response([
                    'message:success' => "products records stored successfully ! . Note that some of records may be not stored so check if there is any errors in response ." ,
                    'message:error'   => $error_messages ,
                ] , 200);

            } else
            {
                return response([
                    'message:error' => $error_messages ,
                ] , 200);
            }

        }

        return response([
            'message'       => "file columns [
             'segment',
            'category',
            'sub_category',
            'supplier',
            'brand',
            'sku',
            'describtion',
            'type',
            'quantity',
            'unit_price',
            'weight',
            'unit',
            'case_price',
            'origin',
            'unit_of_sale'
             ]" ,
            'message:error' => "Empty data" ,
        ] , 422);
    }

    /**
     * @param $type
     *
     * @return ModelResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function SortProductsDirectories($type)
    {
        $types = ['asc' , 'desc'];
        if ( ! in_array($type , $types))
        {
            return response([
                'message' => 'Invalid sort type , available types are [ asc , desc ].' ,
            ] , 200);
        }
        $directories = ProductDirectory::orderBy('segment' , $type)
            ->paginate(config('main.JsonResultCount'))->all();

        return new ModelResource($directories);
    }
}
