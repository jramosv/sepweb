<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('purchase_id')->unsigned();
            $table->foreign('purchase_id')->references('id')->on('purchases');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('quantity');
            $table->decimal('purchase_price', 11, 2);
            $table->decimal('sale_price', 11, 2);

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
        Schema::dropIfExists('purchase_details');
    }
}
