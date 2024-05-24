<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CategoryProduct;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::create([
            'roleId' => 1,
            'roleName' => 'ADMIN',
            
        ]);

        Role::create([
            'roleId' => 2,
            'roleName' => 'PENJUAL',
        ]);

        Role::create([
            'roleId' => 3,
            'roleName' => 'PEMBELI',
        ]);

        User::create([
            'name' => 'ADMIN',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            'city_id' => 17
        ]);

        User::create([
            'name' => 'PENJUAL-1',
            'email' => 'penjual1@penjual.com',
            'password' => bcrypt('penjual1'),
            'role_id' => 2,
            'city_id' => 17
        ]);

        User::create([
            'name' => 'PENJUAL-2',
            'email' => 'penjual2@penjual.com',
            'password' => bcrypt('penjual2'),
            'role_id' => 2,
            'city_id' => 17
        ]);

        User::create([
            'name' => 'PEMBELI-1',
            'email' => 'pembeli1@pembeli.com',
            'password' => bcrypt('pembeli1'),
            'role_id' => 3,
            'city_id' => 17
        ]);

        User::create([
            'name' => 'PEMBELI-2',
            'email' => 'pembeli2@pembeli.com',
            'password' => bcrypt('pembeli2'),
            'role_id' => 3,
            'city_id' => 17
        ]);

        CategoryProduct::create([
            'name' => 'Elektronik',
        ]);
        CategoryProduct::create([
            'name' => 'Pakaian',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan1',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan2',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan3',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan4',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan5',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan6',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan7',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan8',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan9',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan10',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan11',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan12',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan13',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan14',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan15',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan16',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan17',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan18',
        ]);
        CategoryProduct::create([
            'name' => 'Makanan19',
        ]);
    }
}
