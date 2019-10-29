<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Slide::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1 , 2),
        'restaurant_id' => 1,
        'img' => 'slide'.random_int(1 , 2).'.jpg',
    ];
});
