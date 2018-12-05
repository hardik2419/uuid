<?php
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(App\Models\Company::class, function (Faker $faker) {
    return [
		'name' => $faker->company,
		'logo' => $faker->image(storage_path('upload'), $width = 150, $height = 150,false,false),
		'email' => $faker->unique()->safeEmail,
		'phone' => $faker->tollFreePhoneNumber,
		'tagline' => $faker->realText($maxNbChars = 50, $indexSize = 1),
		'founded_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'employe_size' => $faker->numberBetween(10,20),
		'admin_email' => $faker->unique()->safeEmail,
		'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
