<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    protected $fillable = ['date','time','appointment_id','appointment_status_id','doctor_id','patient_id'];

public function diagnostico()
{
    return $this->hasMany('App\MedicalDiagnostic','appointment_id','id');
}
public function estadoCita()
{
    return $this->belongsTo('App\AppointmentStatus','appointment_status_id');
}
public function doctor()
{
    return $this->belongsTo('App\Doctor','doctor_id');
}
public function paciente()
{
    return $this->belongsTo('App\Patient','patient_id');
}}
