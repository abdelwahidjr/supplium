<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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


    public $units = ['kg', 'liter', 'packet', 'bucket', 'case', 'piece', 'box', 'gallon'];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sku'         => 'required|string|max:255',
            "name"        => 'required|string|max:255',
            "unit"        => 'required|in:'.implode(',', $this->units),
            "price"       => 'required|regex:/^\d{0,6}\.\d{0,2}?$/',
            'supplier_id' => 'required|exists:suppliers,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }


    public function messages()
    {
        return [
            "price.regex" => "max decimal number is 999999.99 decimal(8,2)",
            "unit.in"     => "avilable units ['kg', 'liter', 'packet', 'bucket', 'case', 'piece', 'box', 'gallon']",
        ];
    }


}
