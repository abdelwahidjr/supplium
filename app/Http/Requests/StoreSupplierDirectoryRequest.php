<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierDirectoryRequest extends FormRequest
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
            "segment"         => 'required|string|max:255' ,
            'name'            => 'required|unique:supplier_directories|max:255' ,
            'image'           => 'required|mimes:jpeg,jpg,png' ,
            "contact_person"  => 'required|string|max:255' ,
            "position"        => 'required|string|max:255' ,
            "phone_number"    => 'required|string|max:255' ,
            "mobile_number"   => 'required|string|max:255' ,
            'email'           => 'required|unique:supplier_directories|max:255' ,
            "website"         => 'required|string|max:255' ,
            "address"         => 'required|string|max:255' ,
            "operation_areas" => 'required|string|max:255' ,
        ];
    }


}

