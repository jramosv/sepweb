<?php

use Illuminate\Database\Seeder;

class transactionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // comprobamos si la tabla blood_types tiene registros
      if(DB::table('transaction_types')->get()->count() == 0){
        
                    DB::table('transaction_types')->insert([
                        'name' => 'Compra',
                    ]);  
                    DB::table('transaction_types')->insert([
                        'name' => 'Venta',
                    ]);  
                }
    }
}
