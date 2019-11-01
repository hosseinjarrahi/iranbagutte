<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Buycode;
use Faker\Generator as Faker;

$factory->define(Buycode::class, function (Faker $faker) {
    return [
        'user_id' => 1,
	    'code' => random_int(1 , 10),
    ];
});
