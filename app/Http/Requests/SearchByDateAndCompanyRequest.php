<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchByDateAndCompanyRequest extends FormRequest
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


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'date_format:"Y-m-d"|required|before_or_equal:end_date' ,
            'end_date'   => 'date_format:"Y-m-d"|required|after_or_equal:start_date' ,
            'company_id' => 'required|exists:companies,id' ,

        ];
    }

}