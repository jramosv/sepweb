<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['cantidad','fecha','type_id','detail_id','supply_id'];

        public function Type()
        {        
            return $this->hasOne('App\TransactionType', 'type_id'); 
        }

        public function Detail()
        {        
            return $this->hasOne('App\TransactionDetail', 'detail_id'); 
        }

        public function Supply()
        {        
            return $this->hasOne('App\Supply', 'supply_id'); 
        }
}
