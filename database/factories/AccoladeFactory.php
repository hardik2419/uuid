<?php
use App\Models\Accolade;
use Faker\Generator as Faker;

$factory->define(Accolade::class, function (Faker $faker) {
    return [
		'name' => $faker->name,
        'years' => $faker->year($max = 'now'),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 1),
    ];
});
