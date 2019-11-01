<?php

/** @var Factory $factory */

use App\Slide;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Slide::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1 , 2),
        'restaurant_id' => 1,
        'img' => 'slide'.random_int(1 , 2).'.jpg',
    ];
});
