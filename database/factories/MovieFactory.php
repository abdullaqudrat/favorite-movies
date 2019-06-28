<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->streetName,
        'release_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
