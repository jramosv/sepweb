<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['Motivo','Procedure_id'];

        public function Hospitalizations()
        {        
            return $this->hasMany('App\Hospitalization','Procedure_id', 'id');   
        }
    
    
}
