<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Omar',
            'email' => 'omar@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Category::create([
            'name' => 'T-shirt',
            'slug' => 't-shirt'
        ])->items()->saveMany([
                new Item([
                    'name' => 'T-shirt red',
                    'slug' => 't-shirt-red',
                    'description' => 't-shirt color: blue',
                    'price' => 9.99,
                    'quantity' => 10
                ]),
                new Item([
                    'name' => 'T-shirt blue',
                    'slug' => 't-shirt-blue',
                    'description' => 't-shirt color: red',
                    'price' => 9.99,
                    'quantity' => 10
                ])
        ]);

    }
}
