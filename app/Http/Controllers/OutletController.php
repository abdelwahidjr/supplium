<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutletRequest;
use App\Http\Resources\ModelResource;
use App\Models\Outlet;

class OutletController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Outlet::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Outlet::with('outlet','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(OutletRequest $request)
    {
        $outlet = new Outlet;
        $outlet->fill($request->all());
        $outlet->created_by_user_id = $request->user()->id;
        $outlet->save();

        return new ModelResource($outlet);
    }


    public function show($id)
    {

        $Outlet = Outlet::with('brand', 'cart', 'order')->find($id);

        if ($Outlet === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($Outlet);
    }


    public function update(OutletRequest $request, $id)
    {
        $outlet = Outlet::find($id);
        if ($outlet === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $outlet->update($request->all());
        $outlet->updated_by_user_id = $request->user()->id;
        $outlet->save();

        return new ModelResource($outlet);
    }


    public function destroy($id)
    {
        $outlet = Outlet::find($id);
        if ($outlet === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $outlet->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }
}
