<?php

use Faker\Generator as Faker;

$factory->define(App\Market::class, function (Faker $faker) {
    
    return [
        'name' => $faker->city,
        'market' => $faker->numberBetween($min=1,$max=99),
    ];
    
});
