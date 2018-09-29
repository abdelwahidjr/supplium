<?php

namespace App\Http\Middleware;

use Closure;

class Check
{
    public function handle($request , Closure $next)
    {
        if ( ! $request->test)
        {

            return response([
                'message' => "no age found" ,
            ] , 404);
        }

        return $next($request);
    }
}
