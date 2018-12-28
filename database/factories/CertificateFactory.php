<?php
use App\Models\Certificate;
use Faker\Generator as Faker;

$factory->define(Certificate::class, function (Faker $faker) {
    return [
		'name' => $faker->name,
        'years' => $faker->year($max = 'now'),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 1),
    ];
});
