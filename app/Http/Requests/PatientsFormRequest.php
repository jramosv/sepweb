<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientsFormRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'date_birth' => 'required',
            'address' => 'required',
            'phone' => 'numeric|digits:8',
            'sex' => 'required',
            'email' => 'email',
            'blood_types_id' => 'required|integer|not_in:0',
        ];
    }
}
