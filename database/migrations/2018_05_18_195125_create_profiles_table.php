<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_fullname');
            $table->string('user_mobile_no');
            $table->date('user_dob');
            $table->text('user_cover_photo');
            $table->text('user_description');
            $table->decimal('user_avgRating', 2, 2);
            $table->decimal('user_communicationRating', 2, 2);
            $table->decimal('user_presetationRating', 2, 2);
            $table->decimal('user_timingRating', 2, 2);
            $table->decimal('user_describeRating', 2, 2);
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
        Schema::dropIfExists('profiles');
    }
}
