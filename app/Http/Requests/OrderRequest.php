<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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


    public $status = ['pending', 'confirmed', 'fully delivered', 'fully delivered + bounce', 'partially delivered', 'not deliverd'];


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'products'  => 'required|array',
            //"products.*"       => "required|numeric|distinct|exists:products,id",
            'status'    => 'required|string|in:'.implode(',', $this->status),
            'tax'       => ['required', 'regex:/^\d{0,2}\.\d{0,2}?$/'],
            'notes'     => 'required|string',
            'outlet_id' => 'required|exists:outlets,id',
        ];
    }


    public function messages()
    {
        return [
            "tax.regex" => "max decimal number is 99.99",
            "status.in" => "avilable status ['pending', 'confirmed', 'fully delivered', 'fully delivered + bounce', 'partially delivered', 'not deliverd']",
        ];
    }
}
