<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentStatus extends Model
{
    protected $fillable = ['status_name','appointment_statues_id'];

public function cita()
{
    return $this->hasMany('App\MedicalAppointment','appointment_statues_id','id');
}}