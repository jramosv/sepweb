<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provider;

class Purchase extends Model
{
    protected $fillable = [
    	'provider_id', 
    	'document_type', 
    	'document_serie', 
    	'document_no', 
    	'date', 
    	'isActive'
    ];

    public function provider(){
    	return $this->belongsTo('App\Proviers');
    }
}
