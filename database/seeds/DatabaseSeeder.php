<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        factory(App\User::class, 1)->create();
        factory(App\Theme::class, 10)->create();
    }
}
