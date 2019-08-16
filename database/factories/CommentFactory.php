<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;

$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'email' => $faker->email,
        'text' => $faker->paragraph,
    ];
});
