<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['nombre','camas','room_id'];
    
        public function Hospitalizations()
        {        
            return $this->hasMany('App\Hospitalization','room_id', 'id');   
        }
}
