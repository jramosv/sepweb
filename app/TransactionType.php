<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['nombre','type_id'];
    
        public function Transactions()
        {        
            return $this->hasMany('App\Transaction','type_id', 'id');   
        }
}
