<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductDirectoryRequest extends FormRequest
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
            "segment" => 'string|max:255',
            "category" => 'string|max:255',
            "sub_category" => 'string|max:255',
            "supplier" => 'string|max:255',
            "brand" => 'string|max:255',
            'sku'         => 'string|max:255' ,
            "describtion" => 'string|max:255',
            "type" => 'string|max:255',
            "quantity" => 'numeric|min:0',
            "unit_price"       => 'numeric|min:0' ,
            "weight"       => 'numeric|min:0' ,
            "unit" => 'in:' . implode(',', $this->units),
            "case_price" => 'numeric|min:0',
            "origin" => 'string|max:255',
            "unit_of_sale" => 'in:' . implode(',', $this->units_of_sale),
        ];
    }


}

