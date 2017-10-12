<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    protected $fillable = ['fecha','hora','id_paciente','id_paciente','id_medico','id_estado'];

public function diagnostico()
{
    return $this->hasMany('App\MedicalDiagnostic','id_cita','id');
}
public function estadoCita()
{
    return $this->belongsTo('App\AppointmentStatus');
}
public function doctor()
{
    return $this->belongsTo('App\Doctor');
}
public function paciente()
{
    return $this->belongsTo('App\Patient');
}}
