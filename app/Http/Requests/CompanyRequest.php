<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            "name"              => 'required|string|max:255',
            "business_type"     => 'required|string|max:255',
            "phone"             => 'required|string|max:255',
            'address_1'         => 'required|string|max:255',
            'address_2'         => 'string|max:255',
            'website'           => 'string|max:255',
            'country'           => 'required|string|max:255',
            'city'              => 'required|string|max:255',
            'state'             => 'string|max:255',
            'zip'               => 'string|max:255',
            'extra_information' => 'string|max:255',
        ];
    }

}
