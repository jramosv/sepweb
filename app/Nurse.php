<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['nombre','apellido','telefono','direccion'];
    
        public function Hospitalizations()
        {        
            return $this->hasMany('App\Hospitalization','nurse_id', 'id');   
        }
    
}
