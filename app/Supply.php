<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['name','quantity','price','detail','supply_id'];
    
        public function Transactions()
        {        
            return $this->hasMany('App\Transaction','supply_id', 'id');   
        }
}
