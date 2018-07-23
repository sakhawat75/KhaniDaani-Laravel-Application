<?php

use Faker\Generator as Faker;

$factory->define(App\DeliveryService::class, function (Faker $faker) {
    return [
        /*'user_id' => function () {
            return factory(App\User::class)->create()->id;},*/
        'service_title' => $faker->company,
        'service_description' => $faker->paragraph,
        'service_area' => $faker->secondaryAddress,
        
        'service_hours_start' => $faker->time($format = 'H:i:s', $max = 'now'),
        'service_hours_end' => $faker->time($format = 'H:i:s', $max = 'now'),
        'service_charge' =>$faker->numberBetween(100,500),
        'min_delivery_time' =>$faker->time($format = 'H:i:s', $max = 'now'),
        'max_delivery_time' =>$faker->time($format = 'H:i:s', $max = 'now'),
    ];
});
