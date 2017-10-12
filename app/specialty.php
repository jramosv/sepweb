<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{

    protected $fillable = ['nombre'];

    public function Doctores()
    {
        return $this->hasMany('App\Doctor','id_especialidad');
    }

}

