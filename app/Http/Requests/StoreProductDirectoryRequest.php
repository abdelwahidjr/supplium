<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductDirectoryRequest extends FormRequest
{

    public $units = ['GM', 'KG'];
    public $units_of_sale = ['GM', 'CRT'];

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
            "segment" => 'required|string|max:255',
            "category" => 'required|string|max:255',
            "sub_category" => 'required|string|max:255',
            "supplier" => 'required|string|max:255',
            "brand" => 'required|string|max:255',
            'sku' => 'required|unique:product_directories|string|max:255',
            "describtion" => 'required|string|max:255',
            "type" => 'required|string|max:255',
            "quantity" => 'required|numeric|min:0',
            "unit_price" => 'required|numeric|min:0',
            "weight" => 'required|numeric|min:0',
            "unit" => 'required|in:' . implode(',', $this->units),
            "case_price" => 'required|numeric|min:0',
            "origin" => 'required|string|max:255',
            "unit_of_sale" => 'required|in:' . implode(',', $this->units_of_sale),

        ];
    }


}

