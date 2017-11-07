<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderFormRequest extends FormRequest
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
            'nit' => 'required', 
            'tradename' => 'required', 
            'commercial_address' => 'required', 
            'email' => 'required', 
            'phone' => 'required', 
            'contact_name' => 'required', 
            'contact_address' => 'required', 
            'contact_phone' => 'required', 
            'contact_email' => 'required',
        ];
    }
}
