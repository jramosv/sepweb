<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
    	'patient_id',
		'document_type',
		'document_serie',
		'document_no',
		'date',
		'total',
		'isActive',
    ];
}
