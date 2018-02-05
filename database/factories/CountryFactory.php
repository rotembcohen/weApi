<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {
	
	$longCountryName = $faker->country;
	$countryArr = explode(' ',trim($longCountryName));
	$shortCountryName = $countryArr[0];

	return [
        'iso2' => $faker->countryCode,
        'shortName' => $shortCountryName,
        'longName' => $longCountryName,
        'iso3' => $faker->countryCode . strtoupper($faker->randomLetter),
        'numCode' => $faker->numberBetween($min=100,$max=999),
    ];

});
