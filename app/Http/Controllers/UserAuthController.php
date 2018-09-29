<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;
use Hash;
use Symfony\Component\HttpFoundation\Request;

class UserAuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $user = User::where('email' , $request->email)->first();
        if ( ! $user)
        {
            return response()->json([
                'status'  => 'Failed' ,
                'message' => trans('main.credentials') ,
            ] , 400);
        } elseif (Hash::check($request->password , $user->password))
        {
            $token = $user->createToken('Login Token')->accessToken;

            return response()->json(['data' => $user , 'accessToken' => $token] ,
                200);
        }

        return response()->json([
            'status'  => 'Failed' ,
            'message' => trans('main.credentials') ,
        ] , 400);

    }


    public function ChangeMyPassword(Request $request)
    {
        if ($user = Auth::user())
        {
            if (Hash::check($request['old_password'] , $user->password))
            {
                $user->password = Hash::make($request['password']);
                $user->save();

                return response(['message' => trans('passwords.reset')] , 200);
            } else
            {
                return response([
                    'message' => trans('main.credentials') ,
                ] , 422);
            }
        } else
        {
            return response(['message' => "please login" ,] , 422);
        }
    }
}


