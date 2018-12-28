<?php
use App\Models\Portfolio;
use Faker\Generator as Faker;

$factory->define(Portfolio::class, function (Faker $faker) {
    return [
		'title' => $faker->name,
        'video' => 'https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4',
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
