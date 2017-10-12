<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['Nombre','Type_id'];
    
        public function Transactions()
        {        
            return $this->hasMany('App\Transaction','Type_id', 'id');   
        }
}
