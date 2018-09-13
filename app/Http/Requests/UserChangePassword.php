<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserChangePassword
 *
 * @package App\Http\Requests
 */
class UserChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'        => 'required|string|email|max:255|exists:users',
            'old_password' => 'required|min:6',
            'password'     => 'required|min:6|confirmed',
        ];
    }
}
