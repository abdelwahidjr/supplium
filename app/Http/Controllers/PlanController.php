<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\ModelResource;
use App\Models\Plan;

class PlanController extends Controller
{
    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Plan::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Plan::with('plan','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(PlanRequest $request)
    {
        $plan = new Plan;
        $plan->fill($request->all());
        $plan->created_by_user_id = $request->user()->id;
        $plan->save();

        return new ModelResource($plan);
    }


    public function show($id)
    {

        $Plan = Plan::with('company')->find($id);

        if ($Plan === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($Plan);
    }


    public function update(PlanRequest $request , $id)
    {
        $plan = Plan::find($id);
        if ($plan === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $plan->update($request->all());
        $plan->updated_by_user_id = $request->user()->id;
        $plan->save();

        return new ModelResource($plan);
    }


    public function destroy($id)
    {
        $plan = Plan::find($id);
        if ($plan === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $plan->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }
}
