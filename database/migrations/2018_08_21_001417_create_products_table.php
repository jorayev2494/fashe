<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->string('img', 200)->nullable();
            $table->double('price', 15, 8)->nullable();
            $table->string('size', 255)->nullable();
            $table->string('color', 255)->nullable();
            $table->integer('count')->unsigned()->nullable();
            $table->text('description')->nullable();

            $table->integer('status_id')->unsigned()->index()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('products');
    }
}
