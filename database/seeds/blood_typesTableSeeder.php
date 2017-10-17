<?php

use Illuminate\Database\Seeder;

class blood_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// comprobamos si la tabla blood_types tiene registros
        if(DB::table('blood_types')->get()->count() == 0){

			DB::table('blood_types')->insert([
	            'type' => 'A+',
	        ]);  
			DB::table('blood_types')->insert([
	            'type' => 'A-',
	        ]);  
			DB::table('blood_types')->insert([
	            'type' => 'B+',
	        ]);  
			DB::table('blood_types')->insert([
	            'type' => 'B-',
	        ]);  
			DB::table('blood_types')->insert([
	            'type' => 'O+',
	        ]);  
			DB::table('blood_types')->insert([
	            'type' => 'O-',
	        ]);  
			DB::table('blood_types')->insert([
	            'type' => 'AB+',
	        ]);  
			DB::table('blood_types')->insert([
	            'type' => 'AB-',
	        ]);  
		}
	}
}