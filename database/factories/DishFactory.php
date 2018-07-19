<?php

use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {
       return [
    	'profile_id' => function () {
            return factory(App\Profile::class)->create()->id;},
        'dish_category' => $faker->name,
        'dish_subcategory' => $faker->name,
        'dish_name' => $faker->name,
        'dish_description' =>$faker->paragraph,
        'dish_price' => $faker->numberBetween(100,500),
        'preparation_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'dish_thumbnail' => $faker->imageUrl($width = 640, $height = 480),
        'dish_image_1' =>$faker->imageUrl($width = 640, $height = 480),
        'dish_image_2' => $faker->imageUrl($width = 640, $height = 480),
        'dish_image_3' => $faker->imageUrl($width = 640, $height = 480),
        'is_approved' => $faker->boolean,                    
        'item_tags' =>$faker->name,
        'remember_token' => str_random(10),
        
    ];
});
