<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Http\Resources\ModelResource;
use App\Models\Invoice;
use App\Models\Order;

class InvoiceController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Invoice::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Invoice::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(InvoiceRequest $request)
    {
        $order = Order::find($request->input('order_id'));

        if ($order->status != 'confirmed') {
            return response([
                'message' => "order should be confirmed",
            ], 422);

        }

        if ($order->deliverd_status == 'partially_delivered' || $order->deliverd_status == 'not_deliverd') {
            return response([
                'message' => "order should be fully_delivered or fully_delivered_with_bounce",
            ], 422);

        }

        $invoice = new Invoice;

        $invoice->amount             = $order->total_price_after_tax;
        $invoice->order_id           = $order->id;
        $invoice->company_id         = $order->outlet->brand->company->id;
        $invoice->created_by_user_id = $request->user()->id;
        $invoice->save();

        $invoice = Invoice::with('company', 'order')->find($invoice->id);

        return new ModelResource($invoice);
    }


    public function show($id)
    {
        $invoice = Invoice::with('company', 'order')->find($id);

        if ($invoice === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($invoice);
    }


    public function update(InvoiceRequest $request, $id)
    {
        $order = Order::find($request->input('order_id'));

        if ($order->status == 'confirmed') {
            return response([
                'message' => "order should be confirmed",
            ], 422);

        }

        if ($order->deliverd_status == 'fully_delivered' || $order->deliverd_status == 'fully_delivered_with_bounce') {
            return response([
                'message' => "order should be fully_delivered or fully_delivered_with_bounce",
            ], 422);

        }

        $invoice = Invoice::find($id);

        if ($invoice === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        $invoice->amount             = $order->total_price_after_tax;
        $invoice->order_id           = $order->id;
        $invoice->company_id         = $order->outlet->brand->company->id;
        $invoice->updated_by_user_id = $request->user()->id;
        $invoice->save();

        return new ModelResource($invoice);

    }


    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        if ($invoice === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $invoice->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }


}
