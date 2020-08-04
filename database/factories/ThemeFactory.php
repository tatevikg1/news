<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Theme;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Theme::class, function (Faker $faker) {
    return [
        'theme' => $faker->unique()->word,
    ];
});
