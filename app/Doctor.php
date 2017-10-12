<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    
    protected $fillable = ['nombre','apellido','direccion','telefono','id_especialidad'];

    public function especialidad()
    {
        return $this->belongsTo('App\Specialty');
    }

}
