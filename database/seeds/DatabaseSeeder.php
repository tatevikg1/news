<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // factory(App\User::class, 1)->create();
        // factory(App\Theme::class, 10)->create();
        // factory(App\Article::class, 100)->create();
        App\User::create([
            'name' => 'mr. Editor',
            'role' => 0,
            'email' => 'editor@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Illuminate\Support\Str::random(10),
        ]);
    }
}
