<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->string('nombre',100);
            $table->integer('cantidad');
            $table->Decimal('precio',5,2);
            $table->text('detalle');
=======
            $table->string('Nombre',100);
            $table->integer('Cantidad');
            $table->decimal('Precio',5,2);
            $table->text('Detalle');
>>>>>>> a20ea247406acacb95353a60cf098c1754eee041
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
        Schema::dropIfExists('supplies');
    }
}
