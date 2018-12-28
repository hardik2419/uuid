<?php
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
		'name' => $faker->company,
		'logo' => $faker->imageUrl($width = 640, $height = 480),
		'email' => $faker->unique()->safeEmail,
		'phone' => preg_replace("/[^a-zA-Z0-9]/", "", $faker->tollFreePhoneNumber),
		'tagline' => $faker->realText($maxNbChars = 50, $indexSize = 1),
		'founded_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'employe_size' => $faker->numberBetween(10,20),
		'admin_email' => $faker->unique()->safeEmail,
		'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
		'website_url' => $faker->unique()->url,
    ];
});
