<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddMember;
use App\Http\Requests\UserChangePassword;
use App\Http\Requests\UserCreate;
use App\Http\Requests\UserUpdate;
use App\Http\Resources\UserResource;
use App\Models\CompanyUser;
use App\Models\User;
use App\Notifications\OrderConfirmation;
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
        return UserResource::collection(User::paginate(config('main.JsonResultCount')));

        // all with relations
        //return UserResource::collection((User::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(UserCreate $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->created_by_user_id = $request->user()->id;
        $user->save();

        return new UserResource($user);
    }


    public function show($id)
    {
        $user = User::with('company', 'setting')->find($id);

        if ($user === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        $order = "#100";
        Auth::user()->notify(new OrderConfirmation($order));


        return new UserResource($user);
    }


    public function update(UserUpdate $request, $id)
    {
        $user = User::find($id);
        if ($user === null) {
            return response([
                'message' => trans('ssd.null_entity'),
            ], 422);
        }
        $user->update($request->all());
        $user->updated_by_user_id = $request->user()->id;
        $user->save();

        return new UserResource($user);
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
            'message' => trans('main.user_delete'),
        ], 200);
    }

    // add member to company for owner only

    public function AddMember(UserAddMember $request)
    {
        //find owner company
        $company = json_decode(Auth::user()->company()->get());
        //first row
        $company_id = $company[0]->id;

        $user = new User;

        $user->fill($request->all());
        $user->created_by_user_id = Auth::id();
        $user->save();

        $company_user = new CompanyUser;
        $company_user->user_id = $user->id;
        $company_user->company_id = $company_id;
        $company_user->save();

        $role = $request->input('user_role');

        $user->AssignRole($role, 'web');
        $user->AssignRole($role, 'api');

        $user = User::with(['company'])->find($user->id);

        return new UserResource($user);

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

