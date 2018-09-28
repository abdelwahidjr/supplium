<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\ModelResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\Supplier;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class SupplierController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Supplier::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Supplier::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(SupplierRequest $request)
    {
        $supplier = new Supplier;
        $supplier->fill($request->all());
        $supplier->created_by_user_id = $request->user()->id;
        $supplier->save();

        return new ModelResource($supplier);
    }


    public function show($id)
    {
        $supplier = Supplier::with('product' , 'supplier_payment' , 'company' , 'brand')->find($id);

        if ($supplier === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($supplier);
    }


    public function update(SupplierRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        if ($supplier === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $supplier->update($request->all());
        $supplier->updated_by_user_id = $request->user()->id;
        $supplier->save();

        return new ModelResource($supplier);
    }


    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $supplier->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }


    public function directory(DirectoryRequest $request)
    {
        //file columns ['name','email','phone','address','category_name','company_name']

        $path = $request->file->getRealPath();
        $data = Excel::load($path, function ($reader) {
        })->get();

        if ( ! empty($data) && $data->count()) {

            foreach ($data as $key => $value) {

                $supplier = Supplier::where('email', $value->email)->first();
                $category = Category::where('name', $value->category_name)->first();
                $company  = Company::where('name', $value->company_name)->first();

                if ($supplier) {
                    return response([
                        'message'       => "file columns ['name','email','phone','address','category_name','company_name']",
                        'message:error' => $value->email." supplier already exists",
                    ], 422);

                }

                if ( ! $category) {
                    return response([
                        'message'       => "file columns ['name','email','phone','address','category_name','company_name']",
                        'message:error' => $value->category_name." category not found",
                    ], 422);

                }

                if ( ! $company) {
                    return response([
                        'message'       => "file columns ['name','email','phone','address','category_name','company_name']",
                        'message:error' => $value->company_name." company not found",
                    ], 422);

                }

                $insert[] = [
                    'name'             => $value->name,
                    'email'            => $value->email,
                    'phone'            => $value->phone,
                    'address'          => $value->address,
                    'category_id'      => $category->id,
                    'company_id'       => $company->id,
                    'directory_option' => 'on',
                ];
            }

            if ( ! empty($insert)) {
                DB::table('suppliers')->insert($insert);

                return response([
                    'message:success' => "file data saved!",
                ], 422);

            } else {
                return response([
                    'message'       => "file columns ['name','email','phone','address','category_name','company_name']",
                    'message:error' => "file data not saved!, please check the file data",
                ], 422);
            }


        }

        return response([
            'message'       => "file columns ['name','email','phone','address','category_name','company_name']",
            'message:error' => "empty data",
        ], 422);
    }
}
