<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddMember;
use App\Http\Requests\UserChangePassword;
use App\Http\Requests\UserFindByMail;
use App\Http\Requests\UserUpdate;
use App\Http\Resources\ModelResource;
use App\Models\Company;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(User::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((User::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(UserCreate $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->created_by_user_id = $request->user()->id;
        $user->save();

        return new ModelResource($user);
    }


    public function show($id)
    {
        $user = User::with('company', 'setting')->find($id);

        if ($user === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($user);
    }


    public function update(UserUpdate $request, $id)
    {
        $user = User::find($id);
        if ($user === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $user->update($request->all());
        $user->updated_by_user_id = $request->user()->id;
        $user->save();

        return new ModelResource($user);
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $user->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }


    public function FindByMail(UserFindByMail $request)
    {
        $email = $request->input('email');

        $user = User::with('company', 'setting')->where('email', $email)->first();

        if ($user === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($user);
    }

    public function AddMember(UserAddMember $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->created_by_user_id = Auth::id();
        $user->save();

        $company_id = $request->input('company_id');
        $company    = Company::find($company_id);

        $user->company()->sync($company);

        $role = $request->input('user_role');

        $user->AssignRole($role, 'web');
        $user->AssignRole($role, 'api');

        $user = User::with(['company'])->find($user->id);

        return new ModelResource($user);

    }

    public function ChangeUserPassword(UserChangePassword $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if ( ! $user) {
            return response()->json([
                'status'  => 'Failed',
                'message' => trans('main.credentials'),
            ], 400);
        } elseif (Hash::check($request->input('old_password'), $user->password)
        ) {
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return response(['message' => trans('passwords.reset')], 200);
        }

        return response()->json([
            'status'  => 'Failed',
            'message' => trans('main.credentials'),
        ], 400);
    }


}

