<?php

namespace App\Http\Controllers;

use App\Http\Requests\StandingOrderRequest;
use App\Http\Resources\ModelResource;
use App\Models\StandingOrder;

class StandingOrderController extends Controller
{


    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(StandingOrder::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Order::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(StandingOrderRequest $request)
    {
        // first create order and don't save it
        // untill craete standing Order then complete order

        $standing_order = new StandingOrder;
        $standing_order->fill($request->all());
        $standing_order->created_by_user_id = $request->user()->id;
        $standing_order->save();

        return new ModelResource($standing_order);


    }


    public function show($id)
    {
        $standing_order = StandingOrder::with('order')->find($id);

        if ($standing_order === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($standing_order);
    }


    public function update(StandingOrderRequest $request, $id)
    {
        $standing_order = StandingOrder::find($id);

        if ($standing_order === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $standing_order->update($request->all());
        $standing_order->updated_by_user_id = $request->user()->id;
        $standing_order->save();

        return new ModelResource($standing_order);
    }


    public function destroy($id)
    {
        $standing_order = StandingOrder::find($id);
        if ($standing_order === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $standing_order->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }
}
