<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * Class ResetPasswordController
 *
 * @package App\Http\Controllers\Auth
 */
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $this->validate($request , $this->rules() ,
            $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request) , function ($user , $password)
        {
            $this->resetPassword($user , $password);
        });

        if ($request->wantsJson())
        {
            if ($response == Password::PASSWORD_RESET)
            {
                return response()->json(['message' => trans($response)]);
            } else
            {
                return response()->json([
                    'email'   => $request->input('email') ,
                    'message' => trans($response) ,
                ] , 400);
            }
        }

        if ($response == Password::PASSWORD_RESET)
        {
            $user = User::where('email' , $request->input('email'))->first();
            Auth::login($user);

            return $this->sendResetResponse($request , $response);
        } else
        {
            return $this->sendResetFailedResponse($request , $response);
        }

    }

    /**
     * @param User $user
     * @param      $password
     */
    protected function resetPassword(User $user , $password)
    {
        $user->password = Hash::make($password);

        $user->save();

        event(new PasswordReset($user));
    }
}