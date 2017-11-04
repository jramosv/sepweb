<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $fillable = [
    	'sale_id',
		'product_id',
		'quantity',
		'sale_price',
		'discount',
    ];
}
