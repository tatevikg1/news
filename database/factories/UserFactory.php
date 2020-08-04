<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'Editor',
        'role' => 0,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'editor',
        'remember_token' => Str::random(10),
    ];
});
