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
	        $table->integer('dish_user_id');
	        $table->string('dish_name');
	        $table->integer('dsp_id')->nullable();
	        $table->integer('pp_id')->nullable();
	        $table->integer('dsp_user_id')->nullable();
	        $table->integer('pp_user_id')->nullable();
	        $table->double('dsp_service_charge')->nullable();
	        $table->double('pp_service_charge')->nullable();
	        $table->double('dish_price');
	        $table->double('khanidaani_charge');
	        $table->double('total_price');
//            $table->string('quantity');
	        $table->integer('preparation_time');
	        $table->text('delivery_address');
	        $table->text('delivery_address_hint');
	        $table->integer('payment_type');
	        // 1 = khanidaani balance, 2 = bKash
	        $table->integer('delivery_time');
	        $table->integer('rating')->nullable();
	        $table->integer('chef_order_approved')->default(0);
	        // 0 = pending, 1 = accepted, 2 = rejected
	        $table->boolean('chef_is_dish_ready')->default(0);
	        $table->boolean('chef_is_dish_delivered')->default(0);
	        $table->boolean('dsp_is_dish_recieved')->default(0);
	        $table->boolean('dsp_is_dish_delivered')->default(0);
	        $table->boolean('is_order_completed')->default(0);
	        $table->integer('status')->default(1);
	        // 1 = pending, 2 = completed, 3 = cancelled
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
