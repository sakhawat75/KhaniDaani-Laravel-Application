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
             $table->integer('buyer_user_id');
	        $table->string('buyer_fullname');
	        $table->string('buyer_contact_n');
	        $table->string('buyer_cn_opt')->nullable();
	        $table->integer('dish_id');
	        $table->integer('dsp_id');
	        $table->double('dsp_service_charge');
	        $table->double('dish_price');
	        $table->double('khanidaani_charge');
	        $table->double('total_price');
//            $table->string('quantity');
	        $table->integer('preparation_time');
	        $table->text('delivery_address');
	        $table->text('delivery_address_hint');
	        $table->string('payment_type');
            $table->integer('delivery_time');
            $table->integer('rating')->nullable();
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
