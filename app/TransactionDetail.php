<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['Nit','Nombre','Telefono','Direccion','Detail_id'];
    
        public function Transactions()
        {        
            return $this->hasMany('App\Transaction','Detail_id', 'id');   
        }
    
}
