<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence,
        'content' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
        'sent' => 'true',
        'published' => "false",
        'user_id' => "1",

    ];
});
