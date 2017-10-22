<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['quantity','date','type_id','detail_id','supply_id'];

        public function Type()
        {        
            return $this->belongsTo('App\TransactionType', 'type_id'); 
        }

        public function Detail()
        {        
            return $this->belongsTo('App\TransactionDetail', 'detail_id'); 
        }

        public function Supply()
        {        
            return $this->belongsTo('App\Supply', 'supply_id'); 
        }
}
