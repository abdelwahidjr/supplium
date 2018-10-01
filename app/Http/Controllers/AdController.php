<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Http\Requests\AdUpdateRequest;
use App\Http\Resources\ModelResource;
use App\Models\Ad;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{

    public function all()
    {
        return ModelResource::collection(Ad::paginate(config('main.JsonResultCount')));

    }


    /**
     * @param AdRequest $request
     *
     * @return ModelResource
     */
    public function store(AdRequest $request)
    {
        $extension = $request->image->getClientOriginalExtension();
        $sha1      = sha1($request->image->getClientOriginalName());
        $filename  = date('Y-m-d-h-i-s') . "_" . $sha1;

        /*note that i created :
        'ads' => [
            'driver'     => 'local' ,
            'root'       => storage_path('app/public/images/ads') ,
            'url'        => env('APP_URL') . '/storage' ,
            'visibility' => 'public' ,
                ]

        in filesystems.php file to to assign a folder for ads .
        remove this comment after reading it .
        */

        Storage::disk('ads')->put($filename . "." . $extension , File::get($request->image));
        $ad       = new Ad();
        $ad->name = $filename;

        //put your base url to retrieve images
        $ad->url = 'storage/images/ads/' . $filename . "." . $extension;
        $ad->fill($request->all());
        $ad->created_by_user_id = $request->user()->id;
        $ad->save();

        return new ModelResource($ad);

    }


    /**
     * @param $id
     *
     * @return ModelResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::find($id);

        if ($ad === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($ad);

    }


    /**
     * @param AdUpdateRequest $request
     * @param                 $id
     *
     * @return ModelResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(AdUpdateRequest $request , $id)
    {
        $ad = Ad::find($id);
        if ($ad === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        //if user update image
        if ($request->image != null)
        {
            $extension = $request->image->getClientOriginalExtension();
            $sha1      = sha1($request->image->getClientOriginalName());
            $filename  = date('Y-m-d-h-i-s') . "_" . $sha1;
            Storage::disk('ads')->put($filename . "." . $extension , File::get($request->image));
            $ad->name = $filename;
            //put your base url to retrieve images
            $ad->url = 'storage/images/ads/' . $filename . "." . $extension;
        }
        $ad->update($request->all());
        $ad->updated_by_user_id = $request->user()->id;
        $ad->save();

        return new ModelResource($ad);
    }


    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::find($id);
        if ($ad === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $ad->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);

    }
}
