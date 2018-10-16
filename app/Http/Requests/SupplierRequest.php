<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public $directory_option = ['on' , 'off'];
    public $payment_type = ['cash' , 'credit'];
    public $restrict_arr = ['on' , 'off'];
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
            "name"             => 'required|string|max:255' ,
            'email'            => 'required|unique:suppliers|max:255' ,
            "phone"            => 'required|string|max:255' ,
            'address'          => 'required|string|max:255' ,
            'directory_option' => 'required|in:' . implode(',' , $this->directory_option) ,
            'category_id'      => 'required|exists:categories,id' ,
            'company_id'       => 'required|exists:companies,id' ,
            "payment_type"     => 'required|in:' . implode(',' , $this->payment_type) ,
            'credit_limit'     => 'numeric|max:1000000' ,
            'remaining_limit'  => 'numeric|max:1000000' ,
            "credit_period"    => 'in:' . implode(',' , $this->credit_period) ,
            "period_renewal"   => 'required|date' ,
            'payment_due_date' => 'numeric|min:1|max:30' ,
            'restrict'         => 'required|in:' . implode(',' , $this->restrict_arr) ,
        ];
    }


    public function messages()
    {
        return [
            "directory_option.in" => "avilable options ['on', 'off']" ,
            "payment_type.in"     => "avilable payment_type ['cash', 'credit']" ,
            "credit_period.in"    => "avilable credit_period ['15', '30', '45', '60', '90']" ,
            "restrict.in"         => "avilable restriction types ['on','off']" ,
        ];
    }


}

