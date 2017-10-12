<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalizations', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('Egreso');
            $table->dateTime('Ingreso');
            $table->integer('Room_id')->unsigned();
            $table->foreign('Room_id')->references('id')->on('rooms');
            $table->integer('Procedure_id')->unsigned();
            $table->foreign('Procedure_id')->references('id')->on('procedures');
            $table->integer('Nurse_id')->unsigned();
            $table->foreign('Nurse_id')->references('id')->on('nurses');
            $table->integer('Patient_id')->unsigned();
            $table->foreign('Patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('hospitalizations');
    }
}
