<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalDiagnostic extends Model
{
    protected $fillable = ['id_cita','id_paciente','sintoma','tratamiento','diagnostico'];
    public function cita()
    {
        return $this->belongsTo('App\MedicalAppointment');
    }
    public function paciente()
    {
        return $this->belongsTo('App\Patient');
    }
}
