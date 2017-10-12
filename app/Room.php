<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['Nombre','Camas','Room_id'];
    
        public function Hospitalizations()
        {        
            return $this->hasMany('App\Hospitalization','Room_id', 'id');   
        }
}
