<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::firstOrCreate([
            'name' => 'Main Branch',
            'address' => 'Digital Ave., Technology St., Smart City 0000'
        ]);
    }
}
