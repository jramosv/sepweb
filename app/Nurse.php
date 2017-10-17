<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['first_name','last_name','phone','address','nurse_id'];
    
        public function Hospitalizations()
        {        
            return $this->hasMany('App\Hospitalization','nurse_id', 'id');   
        }
    
}
