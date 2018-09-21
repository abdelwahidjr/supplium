<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            "name"        => 'required|string|unique:brands|max:255',
            "description" => 'required|string|max:1000',
            'company_id'  => 'required|exists:companies,id',
        ];
    }

}
