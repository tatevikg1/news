<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'content' => $faker->word,
        'sent' => 'false',
        'published' => "false",
        'user_id' => "2",


    ];
});
