<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {
	
    // for visual purposes, make sure short name only has one word.
	$longCountryName = $faker->country;
	$countryArr = explode(' ',trim($longCountryName));
	$shortCountryName = $countryArr[0];

	return [
        'iso2' => $faker->countryCode,
        'shortName' => $shortCountryName,
        'longName' => $longCountryName,

        // fake random letter, to distinguish from iso2
        'iso3' => $faker->countryCode . strtoupper($faker->randomLetter),
        
        'numCode' => $faker->numberBetween($min=100,$max=999),
    ];

});
