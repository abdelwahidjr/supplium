<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{


    public $types
        = [
            'normal' ,
            'standing' ,
        ];

    public $status
        = [
            'pending' ,
            'confirmed' ,
        ];
    public $deliverd_status
        = [
            'fully_delivered' ,
            'fully_delivered_with_bonus' ,
            'partially_delivered' ,
            'not_delivered' ,
        ];


    public $standing_order_status = ['active' , 'expired'];
    public $repeat_days = ['Sun' , 'Mon' , 'Tue' , 'Wed' , 'Thu' , 'Fri' , 'Sat'];
    public $repeated_period = ['1 week' , '2 week' , '3 week' , '4 week'];

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
            'products'                       => 'required|array' ,
            'products.*.id'                  => 'required|numeric|distinct|exists:products,id' ,
            'products.*.qty'                 => 'required|numeric|max:1000' ,
            'products.*.price'               => 'required|regex:/^\d{0,6}\.\d{0,2}?$/' ,
            'scheduled_on'                   => 'array' ,
            'scheduled_on.*'                 => 'date_format:"Y-m-d"' ,
            'status'                         => 'required|string|in:' . implode(',' , $this->status) ,
            'delivery_status'                => 'required|string|in:' . implode(',' , $this->deliverd_status) ,
            'tax'                            => 'required|regex:/^\d{0,2}\.\d{0,2}?$/' ,
            'notes'                          => 'required|string|max:1000' ,
            'outlet_id'                      => 'required|exists:outlets,id' ,
            'supplier_id'                    => 'required|exists:suppliers,id' ,
            //after merging standing order
            //type attribute to check if order is normal or standing
            'type'                           => 'required|in:' . implode(',' , $this->types) ,
            'standing_order_name'            => 'string|max:255' ,
            'standing_order_status'          => 'string|in:' . implode(',' , $this->standing_order_status) ,
            'standing_order_repeated_days'   => 'array' ,
            'standing_order_repeated_days.*' => 'string|max:255|in:' . implode(',' , $this->repeat_days) ,
            'standing_order_repeated_period' => 'string|max:255|in:' . implode(',' , $this->repeated_period) ,
            'standing_order_start_date'      => 'date_format:"Y-m-d"|after:' . date("Y-m-d") ,
            'standing_order_end_date'        => 'date_format:"Y-m-d"|after:' . date("Y-m-d") ,
        ];
    }


    public function messages()
    {
        return [
            "tax.regex"                         => "max decimal number is 99.99 - decimal(4,2)" ,
            "products.*.price.regex"            => "max decimal number is 999999.99 - decimal(8,2)" ,
            "status.in"                         => "avilable status ['pending', 'confirmed']" ,
            "deliverd_status.in"                => "avilable deliverd status  ['fully_delivered' , 'fully_delivered_with_bonus' , 'partially_delivered' , 'not_delivered']" ,
            "standing_order_repeated_days.*.in" => "avilable days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']" ,
            "standing_order_status.in"          => "avilable status = ['active', 'expired']" ,
            "type.in"                           => "avilable types = ['normal', 'standing']" ,
        ];
    }
}
