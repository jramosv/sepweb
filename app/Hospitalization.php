<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['input','output','room_id','procedure_id','nurse_id','patient_id'];
        
        public function Room()
        {        
            return $this->belongsTo('App\Room','room_id'); 
        }

        public function Procedure()
        {        
            return $this->belongsTo('App\Procedure','procedure_id'); 
        }

        public function Nurse()
        {        
            return $this->belongsTo('App\Nurse','nurse_id'); 
        }
    
        public function Patient()
        {        
            return $this->belongTo('App\Patient','patient_id'); 
        }
    
}
