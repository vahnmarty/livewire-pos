<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::firstOrCreate([
            'name' => 'Coffees',
        ]);

        Category::firstOrCreate([
            'name' => 'Cakes',
        ]);

        Category::firstOrCreate([
            'name' => 'Pasta',
        ]);
    }
}
