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
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mystore.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'admin']);

        $user->assignRole($role);
    }

    public function createManager()
    {
        $user = User::create([
            'name' => 'Manager',
            'email' => 'manager@mystore.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'manager']);

        $user->assignRole($role);
    }

    public function createCashier()
    {
        $user = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@mystore.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'cashier']);

        $user->assignRole($role);
    }
}
