<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'name'        => 'required|unique:plans|string|max:255' ,
            "brand_free"  => 'required|string|max:255' ,
            "brand_max"   => 'required|string|max:255' ,
            "outlet_free" => 'required|string|max:255' ,
            'outlet_max'  => 'required|string|max:255' ,
        ];
    }

}
