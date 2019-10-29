<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Restaurant::class, function (Faker $faker) {
    return [
        'name' => 'رستوران هفت چنار برای نمونه',
        'pics' => json_encode(['res1.jpg']),
        'options' => json_encode(['park','wifi','game','child_bench','music','delivery','kart']),
    ];
});
