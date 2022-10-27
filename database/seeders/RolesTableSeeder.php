<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        $this->createManager();
        $this->createCashier();
    }

    public function createAdmin()
    {
        $user = User::firstOrCreate([
            'email' => 'admin@mystore.com',
            'name' => 'Admin',
            'password' => bcrypt('password')
        ]);

        $role = Role::firstOrCreate(['name' => 'admin']);

        $user->assignRole($role);
    }

    public function createManager()
    {
        $user = User::firstOrCreate([
            'email' => 'manager@mystore.com',
            'name' => 'Manager',
            'password' => bcrypt('password')
        ]);

        $role = Role::firstOrCreate(['name' => 'manager']);

        $user->assignRole($role);
    }

    public function createCashier()
    {
        $user = User::firstOrCreate([
            'email' => 'cashier@mystore.com',
            'name' => 'Cashier',
            'password' => bcrypt('password')
        ]);

        $role = Role::firstOrCreate(['name' => 'cashier']);

        $user->assignRole($role);
    }
}
