<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(blood_typesTableSeeder::class);
         $this->call(transactionTypeTableSeeder::class);
         $this->call(AppointmentsStatusesTableSeed::class);
         $this->call('PatientsTableSeeder');
    }
}
