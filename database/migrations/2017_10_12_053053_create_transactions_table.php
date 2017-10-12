<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Cantidad');
            $table->dateTime('Fecha');
            $table->integer('Type_id')->unsigned();
            $table->foreign('Type_id')->references('id')->on('transaction_types');
            $table->integer('Detail_id')->unsigned();
            $table->foreign('Detail_id')->references('id')->on('transaction_details');
            $table->integer('Supply_id')->unsigned();
            $table->foreign('Supply_id')->references('id')->on('supplies');
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
        Schema::dropIfExists('transactions');
    }
}
