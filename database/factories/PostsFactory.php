<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl,
        'comment' => $faker->realText($maxNbChars = 140),
        'dish_id' => 1,
    ];
});
