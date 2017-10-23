<?php

use Illuminate\Database\Seeder;

class AppointmentsStatusesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('appointment_statuses')->get()->count() == 0){
            
                        DB::table('appointment_statuses')->insert([
                            'status_name' => 'Finalizada',
                        ]);  
                        DB::table('appointment_statuses')->insert([
                            'status_name' => 'Pendiente',
                        ]);  
                        DB::table('appointment_statuses')->insert([
                            'status_name' => 'Pospuesta',
                        ]);  
                        DB::table('appointment_statuses')->insert([
                            'status_name' => 'Cancelada',
                        ]);  
                    }
    }
}
