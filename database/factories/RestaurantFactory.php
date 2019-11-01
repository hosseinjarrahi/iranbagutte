<?php

/** @var Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => 'رستوران هفت چنار برای نمونه',
        'pics' => json_encode(['res1.jpg']),
        'options' => json_encode(['park','wifi','game','child_bench','music','delivery','kart']),
    ];
});
