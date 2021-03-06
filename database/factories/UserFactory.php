<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'is_profile_completed' => true,
        'email_verified_at' => date('Y-m-d H:i:s'),
        'password' => bcrypt('test@123'),
        'phone' => preg_replace("/[^a-zA-Z0-9]/", "", $faker->tollFreePhoneNumber),
        'image' => $faker->imageUrl($width = 150, $height = 150),
        'status' => 'active',
    ];
});
