<?php

use Faker\Generator as Faker;
use App\City;


$factory->define(App\Profile::class, function (Faker $faker) {

    $cities = City::all();
    $city_ind = $faker->numberBetween(1, count($cities));

    $city = City::find($city_ind);

    $areas = \App\Area::where('city_id', $city->id)->get();
    $rand_id = $faker->numberBetween(1, count($areas));

    $area = array();
    foreach ($areas as $a) {
        $area[] = $a->name;
    }


    return [
    	//'user_id' => $faker -> numberBetween(1,100),
//    	'user_id' => function () {
//            return factory(App\User::class)->create()->id;},
        'user_name' => $faker->userName,
        'fullname' => $faker->name,
        'mobile_no' => $faker->numberBetween(0000000,9999999),
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'city' => $city->name,
        'area' => $faker->randomElement($area),
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