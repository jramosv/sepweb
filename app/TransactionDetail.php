<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['nit','name','phone','address'];
    
        public function Transactions()
        {        
            return $this->hasMany('App\Transaction','detail_id', 'id');   
        }
    
}
