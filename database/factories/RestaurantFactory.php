<?php

/** @var Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => 'رستوران هفت چنار برای نمونه',
        'pics' => ['res1.jpg'],
        'options' => ['park','wifi','game','child_bench','music','delivery','kart'],
    ];
});
