<?php

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
    	\App\Category::truncate();
    	\App\Food::truncate();
    	\App\Option::truncate();
    	\App\Slide::truncate();
    	\App\Restaurant::truncate();
        $this->call(CategoryTableSeeder::class);
        $this->call(FoodTableSeeder::class);
        $this->call(OptionTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        $this->call(RestaurantTableSeeder::class);
    }
}
