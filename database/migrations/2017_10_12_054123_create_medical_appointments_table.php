<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->int('id_paciente')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('patients');
            $table->int('id_medico')->unsigned();
            $table->foreign('id_medico')->references('id')->on('doctors');
            $table->int('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('appointment_statuses');
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
        Schema::dropIfExists('medical_appointments');
    }
}
