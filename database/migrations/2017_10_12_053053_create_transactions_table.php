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
            $table->integer('quantitu');
            $table->dateTime('date');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('transaction_types');
            $table->integer('detail_id')->unsigned();
            $table->foreign('detail_id')->references('id')->on('transaction_details');
            $table->integer('supply_id')->unsigned();
            $table->foreign('supply_id')->references('id')->on('supplies');
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
