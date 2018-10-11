<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierDirectoryRequest extends FormRequest
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
            "segment" => 'string|max:255',
            'name' => 'string|max:255',
            'image'       => 'mimes:jpeg,jpg,png' ,
            "contact_person" => 'string|max:255',
            "position" => 'string|max:255',
            "phone_number" => 'string|max:255',
            "mobile_number" => 'string|max:255',
            'email' => 'string|max:255',
            "website" => 'string|max:255',
            "address" => 'string|max:255',
            "operation_areas" => 'string|max:255',
        ];
    }


}

