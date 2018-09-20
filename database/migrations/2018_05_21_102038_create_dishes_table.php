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
            $table->integer('dsp_1')->nullable();
            $table->integer('dsp_2')->nullable();
            $table->integer('dsp_3')->nullable();
            $table->integer('pp1')->nullable();
            $table->integer('pp2')->nullable();
            $table->integer('pp3')->nullable();
            $table->string('dish_category');
            $table->string('dish_subcategory');
            $table->string('dish_name');
            $table->text('dish_description');
            $table->double('dish_price');
            $table->integer('preparation_time');
            $table->string('dish_thumbnail')->default('t1.jpg');
            $table->string('dish_image_1')->default('img1.jpg');
            $table->string('dish_image_2')->default('img2.jpg');
            $table->string('dish_image_3')->default('img3.jpg');
            $table->decimal('avg_rating', 10, 2)->default(0.0);
            $table->boolean('is_approved');
//            $table->text('item_tags');
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
