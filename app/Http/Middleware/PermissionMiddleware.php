<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    public function handle($request , Closure $next , $permission)
    {
        if (app('auth')->guest())
        {
            return response([
                'message' => "user is not logged in" ,
            ] , 403);
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|' , $permission);

        foreach ($permissions as $permission)
        {
            if (app('auth')->user()->can($permission))
            {
                return $next($request);
            }
        }

        return response([
            'message' => "user does not have the right permissions" ,
        ] , 403);
    }
}
