<?php

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
    
	// assigns required foreign keys at random from currently available
    $countryIds = App\Country::all()->pluck('id')->toArray();
	$marketIds = App\Market::all()->pluck('id')->toArray();

    // separates fakes address to 2 lines
    $addressArr = explode(PHP_EOL, $faker->address);
	
	return [
        'name' => substr($faker->sentence(2), 0, -1),
        'desks' => $faker->numberBetween($min = 1000,$max = 9999),
        'Sf' => $faker->numberBetween($min = 10, $max = 999999),
        'address1' => $addressArr[0],
        'address2' => $addressArr[1],
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'postalCode' => $faker->postcode,
        'latitude' => $faker->latitude($min = -90, $max = 90),
        'longitude' => $faker->longitude($min = -180, $max = 180),
        'regionalCategory' => $faker->numberBetween($min = 1, $max = 99),
        'submarketId' => $faker->numberBetween($min = 1, $max = 99),
        'locationId' => $faker->numberBetween($min = 1, $max = 99),
        
        'countryId' => $faker->randomElement($countryIds),
        'marketId' => $faker->randomElement($marketIds),
    ];

});
