<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPermissionRequest;
use App\Http\Requests\RemovePermissionRequest;
use App\Http\Resources\ModelResource;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{


    public function all($permission)
    {
        $permission = Permission::where('name', $permission)->first();
        if ($permission === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);

        }

        $permission_roles_arr = [];
        $roles = Role::get();
        foreach ($roles as $role) {
            if ($role->hasPermissionTo($permission)) {

                array_push($permission_roles_arr, $role);
            }
        }
        return new ModelResource($permission_roles_arr);
    }

    public function AssignPermissionForRole(AssignPermissionRequest $request)
    {

        $role = Role::findByName($request->role_name);
        if ($role->hasPermissionTo($request->permission_name)) {
            return response([
                'message' => 'This role already has this permission.',
            ], 200);
        } else {
            $role->givePermissionTo($request->permission_name);
        }
       $permissions=Role::with('permissions')->where('name',$request->role_name)->get();
       return new ModelResource($permissions);



    }


    public function RemovePermissionFromRole(RemovePermissionRequest $request)
    {

        $role = Role::findByName($request->role_name);
        if ($role->hasPermissionTo($request->permission_name)) {
            $role->revokePermissionTo($request->permission_name);
        } else {
            return response([
                'message' => 'Failed , This role does not  has this permission.',
            ], 200);        }
        $permissions=Role::with('permissions')->where('name',$request->role_name)->get();
        return new ModelResource($permissions);

    }



    //check again if the permission was assigned successfully .
    /* $role = Role::findByName($request->role_name);

     //check again
     if ($role->hasPermissionTo($request->permission_name)) {
         return response([
             'message' => 'Permission was assigned successfully.',
         ], 200);
     } else {
         return response([
             'message' => 'Failed to assign this permission to role.',
         ], 200);
     }*/


    /* $user = new User();
     $user->id = '1';
     $permissions = $user->getPermissionsViaRoles();
     //$permissions=$user->getAllPermissions();

     dump($permissions);*/
}
