<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request , Closure $next , $role)
    {
        if (Auth::guest())
        {
            return response([
                'message' => "user is not logged in" ,
            ] , 403);
        }

        $roles = is_array($role)
            ? $role
            : explode('|' , $role);

        if ( ! Auth::user()->hasAnyRole($roles))
        {
            return response([
                'message' => "user does not have the right roles" ,
            ] , 403);
        }

        return $next($request);
    }
}
