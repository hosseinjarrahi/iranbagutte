<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'file' => 'games/car-game',
        'name' => 'ماشین بازی فلافل فروش',
        'description' => 'توضیحاتی در مورد بازی ماشین فلافل فروش که جالب است بدانید این ماشین فلافل می فروشد ولی جالب است.',
        'poster' => 'car'.random_int(1 , 2).'.jpg',
        'part' => 2,
        'full' => 'games/full.zip',
        'status' => 1,
        'price' => 0
    ];
});
