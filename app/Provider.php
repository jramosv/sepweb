<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Purchase;

class Provider extends Model
{
    protected $fillable = [
    	'nit', 
    	'tradename', 
    	'commercial_address', 
    	'email', 
    	'phone', 
    	'contact_name', 
    	'contact_address', 
    	'contact_phone', 
    	'contact_email',
    ];

    public function purchases(){
    	return $this->hasMany('App\Purchase');
    }
    
}
