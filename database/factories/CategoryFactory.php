<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	$foods = ['پیتزا','همبرگر'];
    return [
        'name' => $foods[random_int(0 , 1)],
	    'restaurant_id' => 1
    ];
});
