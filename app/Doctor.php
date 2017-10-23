<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    

    protected $fillable = ['first_name','last_name','address','phone','speciality_id'];

    public function especialidad()
    {
        return $this->belongsTo('App\Specialty','speciality_id');
    }

}
