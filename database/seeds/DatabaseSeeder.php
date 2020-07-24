<?php

use App\Banner;
use App\Buycode;
use App\Category;
use App\Food;
use App\Game;
use App\Option;
use App\Payment;
use App\Restaurant;
use App\Role;
use App\Slide;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Category::truncate();
    	Banner::truncate();
    	Buycode::truncate();
    	Option::truncate();
    	Slide::truncate();
    	Restaurant::truncate();
    	Game::truncate();
    	User::truncate();
    	Role::truncate();
    	Payment::truncate();
    	Food::truncate();

	    $this->call(BannersTableSeeder::class);
	    $this->call(RolesTableSeeder::class);
	    $this->call(UsersTableSeeder::class);
	    $this->call(CategoriesTableSeeder::class);
	    $this->call(OptionsTableSeeder::class);
	    $this->call(SlidesTableSeeder::class);
	    $this->call(RestaurantsTableSeeder::class);
	    $this->call(GamesTableSeeder::class);
	    $this->call(BuycodesTableSeeder::class);
	    $this->call(PaymentsTableSeeder::class);
	    $this->call(FoodsTableSeeder::class);
    }
}
