<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestoProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createCoffees();
        $this->createCakes();
        $this->createPasta();
    }

    public function createCoffees()
    {
        $category = Category::whereName('Coffees')->first();

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Iced Mocha',
            'price' => 100.00,
            'image' => url('img/coffee1.png')
        ]);

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Hot Americano',
            'price' => 55.00,
            'image' => url('img/coffee2.png')
        ]);

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Caramel Macchiato',
            'price' => 175.00,
            'image' => url('img/coffee3.png')
        ]);

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_QUANTIFIABLE,
            'name' => 'The Coffee Bean Canned 160ml (Mocha)',
            'price' => 215.00,
            'image' => url('img/coffee2.png')
        ]);

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_QUANTIFIABLE,
            'name' => 'UCC Canned 160ml (Latte)',
            'price' => 98.00,
            'image' => url('img/coffee2.png')
        ]);
    }

    public function createCakes()
    {
        $category = Category::whereName('Cakes')->first();

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Mocha Cake (1-Slice)',
            'price' => 160.00,
            'image' => url('img/cake1.png')
        ]);

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Mocha Cake (1-Layer)',
            'price' => 990.00,
            'image' => url('img/cake2.png')
        ]);

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Chocolate Cake (1-Slice)',
            'price' => 195.00,
            'image' => url('img/cake3.png')
        ]);
    }

    public function createPasta()
    {
        $category = Category::whereName('Pasta')->first();

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Creamy Carbonara',
            'price' => 210.00,
            'image' => url('img/pasta1.png')
        ]);

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Beef Spaghetti',
            'price' => 180.00,
            'image' => url('img/pasta2.png')
        ]);

        $category->products()->firstOrCreate([
            'type' => Product::TYPE_MENU,
            'name' => 'Chicken Alfredo',
            'price' => 195.00,
            'image' => url('img/pasta3.png')
        ]);
    }
}
