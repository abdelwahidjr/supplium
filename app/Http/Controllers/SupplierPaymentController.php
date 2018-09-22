<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierPaymentRequest;
use App\Http\Resources\ModelResource;
use App\Models\SupplierPayment;

class SupplierPaymentController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(SupplierPayment::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((SupplierPayment::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(SupplierPaymentRequest $request)
    {
        $supplier_payment = new SupplierPayment;

        if ($request->input('payment_type') == 'cash') {
            $supplier_payment->payment_type       = $request->input('payment_type');
            $supplier_payment->supplier_id        = $request->input('supplier_id');
            $supplier_payment->created_by_user_id = $request->user()->id;
            $supplier_payment->save();
        } elseif ($request->input('payment_type') == 'credit') {
            $supplier_payment->fill($request->all());
            $supplier_payment->created_by_user_id = $request->user()->id;
            $supplier_payment->save();
        }

        $supplier_payment = SupplierPayment::where('id', $supplier_payment->id)->get();

        return new ModelResource($supplier_payment);
    }


    public function show($id)
    {
        $supplier_payment = SupplierPayment::with('supplier')->find($id);

        if ($supplier_payment === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($supplier_payment);
    }


    public function update(SupplierPaymentRequest $request, $id)
    {
        $supplier_payment = SupplierPayment::find($id);
        if ($supplier_payment === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        if ($request->input('payment_type') == 'cash') {
            $supplier_payment->payment_type       = $request->input('payment_type');
            $supplier_payment->supplier_id        = $request->input('supplier_id');
            $supplier_payment->updated_by_user_id = $request->user()->id;
            $supplier_payment->save();
        } elseif ($request->input('payment_type') == 'credit') {
            $supplier_payment->update($request->all());
            $supplier_payment->updated_by_user_id = $request->user()->id;
            $supplier_payment->save();
        }

        return new ModelResource($supplier_payment);

    }


    public function destroy($id)
    {
        $supplier_payment = SupplierPayment::find($id);
        if ($supplier_payment === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $supplier_payment->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }

}
