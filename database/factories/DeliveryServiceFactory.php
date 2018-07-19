<?php

use Faker\Generator as Faker;

$factory->define(App\DeliveryService::class, function (Faker $faker) {
    return [
        /*'user_id' => function () {
            return factory(App\User::class)->create()->id;},*/
        'service_title' => $faker->name,
        'service_description' => $faker->name,
        'service_area' => $faker->secondaryAddress,
        
        'service_hours' => $faker->time($format = 'H:i:s', $max = 'now'),                    
        'service_charge' =>$faker->numberBetween(100,500),
        'min_delivery_time' =>$faker->time($format = 'H:i:s', $max = 'now'),
        'max_delivery_time' =>$faker->time($format = 'H:i:s', $max = 'now'),
    ];
});
