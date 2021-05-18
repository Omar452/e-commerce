<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
