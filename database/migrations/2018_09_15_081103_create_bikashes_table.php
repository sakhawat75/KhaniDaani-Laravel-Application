<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikashes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->string('t_id');
            $table->boolean('is_recharged')->default(0); // 0 = not recharged, 1 = recharged
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
        Schema::dropIfExists('bikashes');
    }
}
