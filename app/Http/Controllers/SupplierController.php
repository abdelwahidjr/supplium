<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\ModelResource;
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
        $supplier = Supplier::with('product', 'company', 'brand')->find($id);

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
        // todo unfinished

        $path = $request->file->getRealPath();
        $data = Excel::load($path, function ($reader) {
        })->get();

        if ( ! empty($data) && $data->count()) {

            foreach ($data as $key => $value) {
                $insert[] = [
                    'name'     => $value->name,
                    'email'    => $value->email,
                    'phone'    => $value->phone,
                    'address'  => $value->address,
                    'category' => $value->category,
                ];
            }

            dd($insert);

            if ( ! empty($insert)) {

                $insertData = DB::table('suppliers')->insert($insert);
            }


        }
    }
}
