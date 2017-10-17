<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['output','input','room_id','procedure_id','nurse_id','patient_id'];
        
        public function Room()
        {        
            return $this->belongsTo('App\room'); 
        }

        public function Procedure()
        {        
            return $this->belongsTo('App\procedure'); 
        }

        public function Nurse()
        {        
            return $this->belongsTo('App\nurse'); 
        }
    
        public function Patient()
        {        
            return $this->belongTo('App\patient'); 
        }
    
}
