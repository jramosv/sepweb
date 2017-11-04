<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_diagnostics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_appointment_id')->unsigned();
            $table->foreign('medical_appointment_id')->references('id')->on('medical_appointments');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->string('treatment',240);
            $table->string('symptom',200);
            $table->string('diagnosis',200);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_diagnostics');
    }
}
