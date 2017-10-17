<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['name','bed','room_id'];
    
        public function Hospitalizations()
        {        
            return $this->hasMany('App\Hospitalization','room_id', 'id');   
        }
}
