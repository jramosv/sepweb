<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{

    protected $fillable = ['name'];

    public function Doctores()
    {
        return $this->hasMany('App\Doctor','speciality_id');
    }

}

