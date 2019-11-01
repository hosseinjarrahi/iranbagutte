<?php

/** @var Factory $factory */

use App\Food;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'restaurant_id' => 1,
	    'category_id' => random_int(1 , 2),
        'title' => 'عنوان غذای تستی می باشد.',
		'small_detail' => 'توضیحات کوتاه برای غذا',
		'main_detail' => 'توضیحات بزرگ برای غذا که میتواند زیاد باشد یا کم و یا بزرگ یا کوتاه ولی غذا غذای خشمزه ای است لطفا امتحان کنید ارزونه جون تو',
		'img' => 'ghaza'.random_int(1 , 2).'.jpg',
		'price' => random_int(100 , 200000),
    ];
});
