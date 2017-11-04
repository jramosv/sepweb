<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = [
    	'purchase_id',
		'product_id',
		'quantity',
		'purchase_price',
		'sale_price',
    ];
}
