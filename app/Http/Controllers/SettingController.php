<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Http\Resources\ModelResource;
use App\Models\Setting;

class SettingController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Setting::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Setting::with('setting','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(SettingRequest $request)
    {
        $setting = new Setting;
        $setting->fill($request->all());
        $setting->created_by_user_id = $request->user()->id;
        $setting->save();

        return new ModelResource($setting);
    }


    public function show($id)
    {
        $Setting = Setting::with('user')->find($id);

        if ($Setting === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($Setting);
    }


    public function update(SettingRequest $request , $id)
    {
        $setting = Setting::find($id);
        if ($setting === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $setting->update($request->all());
        $setting->updated_by_user_id = $request->user()->id;
        $setting->save();

        return new ModelResource($setting);
    }


    public function destroy($id)
    {
        $setting = Setting::find($id);
        if ($setting === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $setting->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }

}
