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
        // order status on creation should be pending

        $products    = [];
        $products_id = [];

        $order = new Order;
        $order->fill($request->all());

        foreach ($request->products as $k => $v) {
            $products[$k]    = $v;
            $products_id[$k] = $v['id'];

            $order->total_qty              += $v['qty'];
            $order->total_price_before_tax += ($v['qty'] * $v['price']);
        }

        $order->tax_val               = ($order->total_price_before_tax * $order->tax / 100);
        $order->total_price_after_tax = (double)$order->total_price_before_tax + $order->tax_val;
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

        if ($order->status == "confirmed") {
            return response([
                'message' => trans('main.edit_not_allowed'),
            ], 422);
        }

        $order->update($request->all());

        $order->total_qty              = 0;
        $order->total_price_before_tax = 0;

        foreach ($request->products as $k => $v) {
            $products[$k]    = $v;
            $products_id[$k] = $v['id'];

            $order->total_qty              += $v['qty'];
            $order->total_price_before_tax += ($v['qty'] * $v['price']);
        }

        $order->tax_val               = ($order->total_price_before_tax * $order->tax / 100);
        $order->total_price_after_tax = (double)$order->total_price_before_tax + $order->tax_val;
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

        $products_id = [];

        foreach ($order->products as $k => $v) {
            $products_id[$k] = $v['id'];
        }

        $order->product()->detach($products_id);

        $order->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }
}
