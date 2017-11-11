<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleFormRequest extends FormRequest
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
        'patient_id' => 'required',
        'document_type' => 'required',
        'document_no' => 'required',
        'date' => 'required',
        'product_id' => 'required',
        'quantity' => 'required',
        'sale_price' => 'required',
        'total' => 'required',
    ];
    }
}
