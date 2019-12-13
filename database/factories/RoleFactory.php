<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;
$access = [
    'admin',
    'advertise',
    'posts',
    'payments',
    'games',
    'comments',
    'setting',
    'tables',
    'users',
];
$counter = 0;
$factory->define(Role::class, function (Faker $faker) use ($access,$counter){
    return [
        'access' => $access[$counter]
    ];
    $counter++;
});
