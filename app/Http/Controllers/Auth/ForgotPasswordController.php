<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Mail;

/**
 * Class ForgotPasswordController
 *
 * @package App\Http\Controllers\Auth
 */
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getResetToken(Request $request)
    {
        $this->validate($request ,
            ['email' => 'required|string|email|max:255|exists:users']);

        $user = User::where('email' , $request->input('email'))->first();
        if ( ! $user)
        {
            return response(['message' => trans('passwords.user')] , 400);
        }

        $token = $this->broker()->createToken($user);
        Mail::to($request->input('email'))->send(new ForgetPassword($token));

        return response([
            'message' => trans('passwords.sent') ,
            'token'   => $token ,

        ] , 200);

    }
}