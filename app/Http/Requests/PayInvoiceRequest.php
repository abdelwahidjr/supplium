<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayInvoiceRequest extends FormRequest
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
            'invoice_id' => 'required|exists:invoices,id' ,
            'amount'     => 'required|numeric|min:1' ,
        ];
    }


}
