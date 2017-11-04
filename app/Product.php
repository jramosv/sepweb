<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'stock', 'min_amount', 'max_amount', 'due_date', 'isActive'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
