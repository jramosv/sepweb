<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['first_name','last_name', 'address', 'phone', 'date_birth','sex','email', 'blood_types_id'];

    /**
	 * Obtiene el nombre completo del paciente.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getFullNameAttribute()
	{
	    return "{$this->first_name} {$this->last_name}";
	}

	/**
     * Asigna un valor con cambios al campo indicado.
     *
     * @param  string  $value
     * @return void
     */
    // public function setFirstNameAttribute($value)
    // {
    //     $this->attributes['first_name'] = strtolower($value);
    // }
	   
    public function tiposangre()
    {
        return $this->belongsTo('App\BloodType', 'blood_types_id');
    }

   


}


