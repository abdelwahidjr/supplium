<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\ModelResource;
use App\Models\Order;

class OrderController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Order::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Order::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(OrderRequest $request)
    {
        $products    = [];
        $products_id = [];

        $order           = new Order;
        $order->products = $request->input('products');
        $order->status   = $request->input('status');
        $order->notes    = $request->input('notes');

        foreach ($request->products as $k => $v) {
            $products[$k]    = $v;
            $products_id[$k] = $v['id'];

            $order->total_qty              += $v['qty'];
            $order->total_price_before_tax += ($v['qty'] * $v['price']);
        }

        $order->tax                   = $request->input('tax');
        $order->tax_val               = ($order->total_price_before_tax * $order->tax / 100);
        $order->total_price_after_tax = (double)$order->total_price_before_tax + $order->tax_val;
        $order->outlet_id             = $request->input('outlet_id');
        $order->created_by_user_id    = $request->user()->id;
        $order->save();

        $order->product()->sync($products_id);

        return new ModelResource($order);


    }


    public function show($id)
    {
        $order = Order::with('outlet', 'product')->find($id);

        if ($order === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($order);
    }


    public function update(OrderRequest $request, $id)
    {
        $products    = [];
        $products_id = [];

        $order = Order::find($id);
        if ($order === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        if ($order->stauts !== 'pending') {
            return response([
                'message' => trans('main.edit_not_allowed'),
            ], 422);
        }

        $order->products = $request->input('products');
        $order->status   = $request->input('status');
        $order->notes    = $request->input('notes');

        foreach ($request->products as $k => $v) {
            $products[$k]    = $v;
            $products_id[$k] = $v['id'];

            $order->total_qty              += $v['qty'];
            $order->total_price_before_tax += ($v['qty'] * $v['price']);
        }

        $order->tax                   = $request->input('tax');
        $order->tax_val               = ($order->total_price_before_tax * $order->tax / 100);
        $order->total_price_after_tax = (double)$order->total_price_before_tax + $order->tax_val;
        $order->outlet_id             = $request->input('outlet_id');
        $order->updated_by_user_id    = $request->user()->id;
        $order->save();

        $order->product()->sync($products_id);

        return new ModelResource($order);

    }


    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $order->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }
}
