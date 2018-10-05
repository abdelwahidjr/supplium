<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SwitchRestrictionRequest extends FormRequest
{
    public $restrict_arr = ['on', 'off'];


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
            'supplier_id' => 'required|exists:supplier_payment,id' ,
            'restrict' => 'required|in:' . implode(',', $this->restrict_arr),
        ];
    }

    public function messages()
    {
        return [
            "restrict.in" => "avilable restriction types ['on','off']",
        ];
    }

}
