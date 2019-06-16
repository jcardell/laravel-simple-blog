<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'excerpt' => $faker->paragraph(6),
        'content_html' => $faker->paragraph(100),
        'post_image' => null,
        'user_id' => \App\User::all()->random()->id
    ];
});
