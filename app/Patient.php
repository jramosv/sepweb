<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['first_name','last_name','date_birth','sex','email', 'blood_types_id'];
   
    public function tiposangre()
    {
        return $this->belongsTo('App\BloodType', 'blood_types_id');
    }

   


}


