<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customers_id')->unsigned()->nullable();

            // $table->integer('customers_id')->unsigned();
            // $table->foreign('customers_id')->references('id')->on('customers');

            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');

            $table->integer('price_once')->unsigned();
            $table->integer('count')->unsigned();
            $table->integer('summa')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();

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
        Schema::dropIfExists('orders');
    }
}
