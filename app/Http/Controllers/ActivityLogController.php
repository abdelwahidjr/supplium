<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModelResource;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{

    public function __construct()
    {
        $permissions = [
            'all'    => ['all functions'] ,
            'show'   => ['all functions'] ,
            'create' => ['all functions'] ,
            'edit'   => ['all functions'] ,
            'delete' => ['all functions'] ,

        ];

    }


    public function all()
    {
        $activity = Activity::with('user')->latest()->paginate(config('main.JsonResultCount'));

        return ModelResource::collection($activity);
    }


    public function ShowActivity($id)
    {
        $activity = Activity::with('user')->find($id);

        if ($activity === null)
        {
            return response([
                'message' => 'no activity' ,
            ] , 422);
        }

        return new ModelResource($activity);
    }


    public function FindUserActivity($id)
    {
        $activity = Activity::where('user_id' , $id)->latest()->paginate(config('main.JsonResultCount'));

        return ModelResource::collection($activity);

    }


}
