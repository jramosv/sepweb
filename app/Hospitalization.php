<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['egreso','ingreso','room_id','procedure_id','nurse_id','patient_id'];
        
        public function Room()
        {        
            return $this->belongsTo('App\Room'); 
        }

        public function Procedure()
        {        
            return $this->belongsTo('App\Procedure'); 
        }

        public function Nurse()
        {        
            return $this->belongsTo('App\Nurse'); 
        }
    
        public function Patient()
        {        
            return $this->belongTo('App\Patient'); 
        }
    
}
