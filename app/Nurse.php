<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['Nombre','Apellido','Telefono','Direccion','Nurse_id'];
    
        public function Hospitalizations()
        {        
            return $this->hasMany('App\Hospitalization','Nurse_id', 'id');   
        }
    
}
