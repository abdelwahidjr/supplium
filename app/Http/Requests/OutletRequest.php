<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutletRequest extends FormRequest
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
            "name"             => 'required|string|unique:outlets|max:255',
            "phone"            => 'required|string|max:1000',
            "address"          => 'required|string|max:255',
            "longitude"        => 'required|string|max:255',
            "latitude"         => 'required|string|max:255',
            "city"             => 'required|string|max:255',
            "shipping_address" => 'required|string|max:255',
            'brand_id'         => 'required|exists:brands,id',
        ];
    }

}
