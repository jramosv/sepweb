<?php

use Illuminate\Database\Seeder;
use App\BloodType;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->delete();

        $tipos = BloodType::all();
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; ++$i) {
            $patient = new Patient();
            // $patient->first_name = $faker->firstName;
            // $patient->last_name = $faker->lastName;
            // $patient->address = $faker->address;
            // $patient->phone = $faker->numberBetween($min = 10000000, $max = 90000000);
            // $patient->date_birth = $faker->date($format = 'Y-m-d', $max = 'now');
            // $patient->sex = $faker->randomElement($array = array ('Masculino','Femenino'));
            // $patient->email = $faker->unique()->email;
            // $tipos->random(1)->pacientes()->save($patient);

            $patient->first_name = 'Jose ' . $i;
            $patient->last_name = 'Cantandola ' . $i;
            $patient->address = 'Direccion ' . $i;
            $patient->phone = 10000000 + $i;
            $patient->date_birth = '1992-12-12';
            $patient->sex = 'Masculino';
            $patient->email = 'myemail' . $i . '@gmail.com';
            $patient->blood_types_id = 1;
            $patient->save();
        }
    }
}
