<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalDiagnostic extends Model
{
    protected $fillable = ['id','medical_appointment_id','patient_id','prescription_id','symptom','diagnosis'];
    public function cita()
    {
        return $this->belongsTo('App\MedicalAppointment','medical_appointment_id');
    }
    public function paciente()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
