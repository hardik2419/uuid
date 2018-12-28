<?php
use App\Models\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
		'email' => $faker->unique()->safeEmail,
        'phone' => preg_replace("/[^a-zA-Z0-9]/", "", $faker->tollFreePhoneNumber),
        'longitude' => $faker->longitude($min = -180, $max = 180),
        'latitude' => $faker->latitude($min = -90, $max = 90),
        'address_1' => $faker->streetName,
        'address_2' => $faker->streetAddress,
        'city' => $faker->city,
        'country' => $faker->streetAddress,
        'zip_code' => $faker->postcode,
        'employee_count' => 10,
    ];
});
