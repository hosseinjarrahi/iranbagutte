<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'checkGame',
            'slides',
            'special',
            'developer',
            'adminSetting',
            'buycode',
            'vip',
        ];
        foreach ($access as $a)
            Role::create(['access' => $a]);
    }
}
