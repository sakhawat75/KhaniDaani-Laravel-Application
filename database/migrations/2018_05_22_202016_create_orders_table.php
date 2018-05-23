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
             $table->integer('users_id');
            $table->integer('dishes_id');
            $table->double('dish_price');
            $table->string('quantity');
            $table->string('preparation_time');
            $table->integer('dsp_id');
            $table->text('delivery_address');
            $table->integer('contact_number');
            $table->date('delivery_time');
            $table->integer('rating');
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
