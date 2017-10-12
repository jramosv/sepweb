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
            $table->integer('id_cita')->unsigned();
            $table->foreign('id_cita')->references('id')->on('medical_appointments');
            $table->integer('id_paciente')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('patients');
            $table->string('sintoma',200);
            $table->string('tratamiento',200);
            $table->string('diagnostico',200);
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
