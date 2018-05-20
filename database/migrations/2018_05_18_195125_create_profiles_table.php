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
            $table->integer('user_id');
            $table->string('fullname');
            $table->string('mobile_no');
            $table->date('dob');
            $table->text('cover_photo');
            $table->text('profile_photo');
            $table->text('description');
            $table->decimal('avgRating', 2, 2);
            $table->decimal('communicationRating', 2, 2);
            $table->decimal('presetationRating', 2, 2);
            $table->decimal('timingRating', 2, 2);
            $table->decimal('describeRating', 2, 2);
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
