<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $fillable = ['type'];


public function pacientes()
{
    return $this->hasMany('App\Patient', 'blood_types_id', 'id');
}}