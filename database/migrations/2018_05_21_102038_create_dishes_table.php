<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id');
            $table->string('dish_category');
            $table->string('dish_subcategory');
            $table->string('dish_name');
            $table->text('dish_description');
            $table->double('dish_price');
            $table->string('preparation_time');
            $table->text('dish_thumbnail');
            $table->text('dish_image_1');
            $table->text('dish_image_2');
            $table->text('dish_image_3');
            $table->boolean('is_approved');
            $table->text('item_tags');
            $table->rememberToken();
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
        Schema::dropIfExists('dishes');
    }
}
