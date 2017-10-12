<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['Egreso','Ingreso','Room_id','Procedure_id','Nurse_id','Patient_id'];
        
        public function Room()
        {        
            return $this->hasOne('App\Room', 'Room_id'); 
        }

        public function Procedure()
        {        
            return $this->hasOne('App\Procedure', 'Procedure_id'); 
        }

        public function Nurse()
        {        
            return $this->hasOne('App\Nurse', 'Nurse_id'); 
        }
    
        public function Patient()
        {        
            return $this->belongTo('App\Patient'); 
        }
    
}
