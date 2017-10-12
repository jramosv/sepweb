<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $primaryKey = 'id';
    
        protected $fillable =['Nombre','Cantidad','Precio','Detalle','Supply_id'];
    
        public function Transactions()
        {        
            return $this->hasMany('App\Transaction','Supply_id', 'id');   
        }
}
