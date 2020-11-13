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
    'settings',
    'tables',
    'users',
    'sendGame',
    'adminSetting',
    'checkGame',
    'events',
    'slides',
];
$factory->define(Role::class, function (Faker $faker) use ($access){
    return [
        'access' => $access[0]
    ];
});
