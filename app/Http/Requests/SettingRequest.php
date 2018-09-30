<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{

    public $state = ['on' , 'off'];


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "notification" => 'required|in:' . implode(',' , $this->state) ,
            'user_id'      => 'required|exists:users,id' ,
        ];
    }

}
