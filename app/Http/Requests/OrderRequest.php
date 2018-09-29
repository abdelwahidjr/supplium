<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{


    public $status
        = [
            'pending' ,
            'confirmed' ,
        ];
    public $deliverd_status
        = [
            'fully_delivered' ,
            'fully_delivered_with_bounce' ,
            'partially_delivered' ,
            'not_deliverd' ,
        ];

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
            'products'         => 'required|array' ,
            'products.*.id'    => 'required|numeric|distinct|exists:products,id' ,
            'products.*.qty'   => 'required|numeric|max:1000' ,
            'products.*.price' => 'required|regex:/^\d{0,6}\.\d{0,2}?$/' ,
            'scheduled_on'     => 'array' ,
            'scheduled_on.*'   => 'date_format:"Y-m-d"' ,
            'status'           => 'required|string|in:' . implode(',' , $this->status) ,
            'deliverd_status'  => 'required|string|in:' . implode(',' , $this->deliverd_status) ,
            'tax'              => 'required|regex:/^\d{0,2}\.\d{0,2}?$/' ,
            'notes'            => 'required|string|max:1000' ,
            'outlet_id'        => 'required|exists:outlets,id' ,
            'supplier_id'      => 'required|exists:suppliers,id' ,
        ];
    }


    public function messages()
    {
        return [
            "tax.regex"              => "max decimal number is 99.99 - decimal(4,2)" ,
            "products.*.price.regex" => "max decimal number is 999999.99 - decimal(8,2)" ,
            "status.in"              => "avilable status ['pending', 'confirmed']" ,
            "deliverd_status.in"     => "avilable deliverd status ['fully delivered', 'fully delivered + bounce', 'partially delivered', 'not deliverd']" ,
        ];
    }
}
