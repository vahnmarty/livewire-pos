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
            'image' => url('img/coffee.png')
        ]);

        Category::firstOrCreate([
            'name' => 'Cakes',
            'image' => url('img/cake.png')
        ]);

        Category::firstOrCreate([
            'name' => 'Pasta',
            'image' => url('img/pasta.png')
        ]);
    }
}
