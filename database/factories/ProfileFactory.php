<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {

    return [
    	//'user_id' => $faker -> numberBetween(1,100),
//    	'user_id' => function () {
//            return factory(App\User::class)->create()->id;},
        'user_name' => $faker->userName,
        'fullname' => $faker->name,
        'mobile_no' => $faker->phoneNumber,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'city' => $faker->city,
        'area' => $faker->secondaryAddress,
        'address' => $faker->address,
        'address_hint' => $faker->streetName,                    
//        'cover_image' =>$faker->imageUrl($width = 640, $height = 480),
//        'profile_image' =>$faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->paragraph,
        'avgRating' => $faker->numberBetween(1,5),
        'communicationRating' => $faker->numberBetween(1,5),
        'presentationRating' => $faker->numberBetween(1,5),
        'timingRating' => $faker->numberBetween(1,5),
        'describeRating' => $faker->numberBetween(1,5),
    ];
});