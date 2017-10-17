<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['reason','procedure_id'];

        public function Hospitalizations()
        {        
            return $this->hasMany('App\Hospitalization','procedure_id', 'id');   
        }
    
    
}
