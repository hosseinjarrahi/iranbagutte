<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Slide::class,2)->create();
    }
}
