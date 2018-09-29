<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierPaymentRequest extends FormRequest
{
    public $payment_type = ['cash' , 'credit'];
    public $credit_period = ['15' , '30' , '45' , '60' , '90'];

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
            "payment_type"     => 'required|in:' . implode(',' , $this->payment_type) ,
            'credit_limit'     => 'numeric|max:1000000' ,
            "credit_period"    => 'in:' . implode(',' , $this->credit_period) ,
            'payment_due_date' => 'numeric|min:1|max:30' ,
            'supplier_id'      => 'required|exists:suppliers,id' ,
        ];
    }


    public function messages()
    {
        return [
            "payment_type.in"  => "avilable payment_type ['cash', 'credit']" ,
            "credit_period.in" => "avilable credit_period ['15', '30', '45', '60', '90']" ,
        ];
    }


}

