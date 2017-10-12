<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $fillable = ['tipo_sangre'];


public function paciente()
{
    return $this->hasMany('App\Patient','tipo_sangre','id');
}}