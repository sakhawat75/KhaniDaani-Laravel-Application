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
            
            $table->string('user_name');
            $table->string('fullname');
            $table->boolean('is_available')->default(1);
            $table->string('mobile_no');
            $table->date('dob');
            $table->string('city');
            $table->string('area');
            $table->text('address')->nullable();
            $table->text('address_hint')->nullable();
            $table->string('cover_image')->default('authcvr.jpg');
            $table->string('profile_image')->default('author-avatar.jpg');;
            $table->text('description')->nullable();
            $table->decimal('avgRating', 2, 2)->nullable();
            $table->decimal('communicationRating', 2, 2)->nullable();
            $table->decimal('presentationRating', 2, 2)->nullable();
            $table->decimal('timingRating', 2, 2)->nullable();
            $table->decimal('describeRating', 2, 2)->nullable();
            $table->decimal('balance', 10, 2)->default(0);
            $table->timestamps();

            //$table->foreign( 'user_id')->references('id')->on('users')->onDelete('cascade');
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
