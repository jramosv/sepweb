<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['nombre','cantidad','precio','detalle','supply_id'];
    
        public function Transactions()
        {        
            return $this->hasMany('App\Transaction','supply_id', 'id');   
        }
}
