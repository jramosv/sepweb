<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalAppointmentsFormRequest extends FormRequest
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
            'date' => 'required',
            'time' => 'required',       
            'doctor_id' => 'required|integer|not_in:0',
            'patient_id' => 'required|integer|not_in:0',
            'appointment_status_id' => 'required|integer|not_in:0',
        ];
    }
}
