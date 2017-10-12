<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['Cantidad','Fecha','Type_id','Detail_id','Supply_id'];

        public function Type()
        {        
            return $this->hasOne('App\TransactionType', 'Type_id'); 
        }

        public function Detail()
        {        
            return $this->hasOne('App\TransactionDetail', 'Detail_id'); 
        }

        public function Supply()
        {        
            return $this->hasOne('App\Supply', 'Supply_id'); 
        }
}
