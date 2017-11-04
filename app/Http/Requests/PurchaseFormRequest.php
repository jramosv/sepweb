<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseFormRequest extends FormRequest
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
            'provider_id' => 'required', 
            'document_type' => 'required', 
            'document_serie' => 'required', 
            'document_no' => 'required', 
            'date' => 'required', 
            'product_id' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',

        ];
    }
}
