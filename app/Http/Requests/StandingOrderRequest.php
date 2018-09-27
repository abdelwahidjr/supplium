<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StandingOrderRequest extends FormRequest
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


    public $status = ['active' , 'expired'];
    public $repeat_days = ['Sun' , 'Mon' , 'Tue' , 'Wed' , 'Thu' , 'Fri' , 'Sat'];
    public $repeated_period = ['1 week' , '2 week' , '3 week' , '4 week'];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => 'required|string|max:255' ,
            'status'          => 'required|string|in:' . implode(',' , $this->status) ,
            'repeated_days'   => 'required|array' ,
            'repeated_days.*' => 'required|string|max:255|in:' . implode(',' , $this->repeat_days) ,
            'repeated_period' => 'required|string|max:255|in:' . implode(',' , $this->repeated_period) ,
            'start_date'      => 'date_format:"Y-m-d"|required|after:' . date("Y-m-d") ,
            'end_date'        => 'date_format:"Y-m-d"|required|after:' . date("Y-m-d") ,
        ];
    }

    public function messages()
    {
        return [
            "repeated_days.*.in" => "avilable days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']" ,
            "status.in"          => "avilable status = ['active', 'expired']" ,
        ];
    }
}
