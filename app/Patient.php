<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name','apellido','fecha_nacimiento','sexo','telefono','direccion','correo','tipo_sangre'];
   
    public function tipoSangre()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function hospitalizacion()
    {
        return $this->hasMany('App\Hospitalization','patient_id','id');
    }
    public function diagnositco()
    {
        return $this->hasMany('App\MedicalDiagnostic','id_paciente','id');
    }

    public function cita()
    {
        return $this->hasMany('App\MedicalAppointment','id_paciente','id');
    }


}


