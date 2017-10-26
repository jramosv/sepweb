<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['id','supplies_id','dose'];
    public function medicamento()
    {
        return $this->belongsTo('App\Supplies','suplies_id');
    }
}
    