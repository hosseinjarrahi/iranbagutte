<?php

use Illuminate\Database\Seeder;

class BuycodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Buycode::class,10)->create();
    }
}
