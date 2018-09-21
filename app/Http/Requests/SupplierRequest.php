<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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


    public $directory_option = ['on', 'off'];


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"             => 'required|string|max:255',
            'email'            => 'required|unique:suppliers|max:255',
            "phone"            => 'required|string|max:255',
            'address'          => 'required|string|max:255',
            'directory_option' => 'required|in:'.implode(',', $this->directory_option),
            'category_id'      => 'required|exists:categories,id',
            'company_id'       => 'required|exists:companies,id',
        ];
    }


    public function messages()
    {
        return [
            "directory_option.in" => "avilable options ['on', 'off']",
        ];
    }


}

