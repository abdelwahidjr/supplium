<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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


    public $status = ['empty', 'not_empty'];


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'products'         => 'required|array',
            'products.*.id'    => 'required|numeric|distinct|exists:products,id',
            'products.*.qty'   => 'required|numeric|max:1000',
            'products.*.price' => 'required|regex:/^\d{0,6}\.\d{0,2}?$/',
            "status"           => 'required|in:'.implode(',', $this->status),
            'notes'            => 'required|string|max:1000',
            'outlet_id'        => 'required|exists:outlets,id',
        ];
    }


    public function messages()
    {
        return [
            "status.in"              => "avilable status ['empty', 'not_empty']",
            "products.*.price.regex" => "max decimal number is 999999.99 - decimal(8,2)",
        ];
    }


}