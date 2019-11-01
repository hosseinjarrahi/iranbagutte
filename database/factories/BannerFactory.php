<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$banners = [
	0 => [
		'clicks' => 0,
		'url' => 'http://google.com',
		'img' => 'adv.gif',
		'state' => 1,
		],
	1 => [
		'clicks' => 0,
		'url' => 'http://google.com',
		'img' => 'adv.gif',
		'state' => 0,
		],
	2 => [
		'clicks' => 0,
		'url' => 'http://google.com',
		'text' => 'این یک متن زیرونویس است لطفا دقت بفرمایید.',
		'time' => 60
		],
	3 => [
		'clicks' => 0,
		'url' => 'http://google.com',
		'img' => 'mast.jpg',
		'state' => 2,
		'time' => 5
	],
];
$counter = 0;

$factory->define(App\Banner::class, function (Faker $faker) use (&$counter,$banners) {
    return $banners[$counter++];
});
