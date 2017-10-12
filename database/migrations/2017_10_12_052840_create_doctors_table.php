<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->text('direccion');
            $table->string('telefono', 10);
            $table->integer('id_especialidad')->unsigned();
            $table->foreign('id_especialidad')->references('id')->on('specialties');
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
        Schema::dropIfExists('doctors');
    }
}
