<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_count')->unsigned()->nullable();
            $table->integer('cart_sum')->unsigned()->nullable();
            $table->string('status', 100)->nullable()->default('animating');
            $table->string('name_customer', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('shipping', 100)->nullable();

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
        // $table->dropForeign('customers_user_id_foreign');
        Schema::dropIfExists('customers');
    }
}
