<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentStatus extends Model
{
    protected $fillable = ['nombre_estado'];

public function cita()
{
    return $this->hasMany('App\MedicalAppointmen','id_estado','id');
}}