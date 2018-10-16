<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignRoleRequest;
use App\Http\Requests\RemoveRoleRequest;
use App\Http\Resources\ModelResource;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function all($role)
    {

        $role = Role::where('name' , $role)->first();
        if ($role === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);

        }

        $role_users_arr = [];
        $users          = User::get();
        foreach ($users as $user)
        {
            if ($user->hasRole($role))
            {

                array_push($role_users_arr , $user);
            }

        }

        return new ModelResource($role_users_arr);


    }

    public function AssignRoleForUser(AssignRoleRequest $request)
    {
        $user     = new User();
        $user->id = $request->user_id;
        //all user's roles will be deleted
        $user->syncRoles();
        //assign new role
        $user->AssignRole($request->role_name , 'api');
        $roles = $user->getRoleNames(); // Returns a collection*/

        return new ModelResource($roles);
    }

    public function RemoveRoles(RemoveRoleRequest $request)
    {
        $user     = new User();
        $user->id = $request->user_id;
        //all user's roles will be deleted
        $user->syncRoles();
        //assign new role
        $user->AssignRole('user' , 'api');
        $roles = $user->getRoleNames(); // Returns a collection

        return new ModelResource($roles);
    }

}
