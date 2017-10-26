<?php

use Illuminate\Database\Seeder;

class ProceduresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('procedures')->get()->count() == 0){
            
                        DB::table('procedures')->insert([
                            'reason' => 'Emergencia',
                        ]);  
                        DB::table('procedures')->insert([
                            'reason' => 'Prevencion',
                        ]); 
                        DB::table('procedures')->insert([
                            'reason' => 'Recuperacion',
                        ]); 
                        DB::table('procedures')->insert([
                            'reason' => 'Otros',
                        ]); 
                       
                    }
        //
    }
}
