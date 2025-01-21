<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role_name' => 'Super Admin'],
            ['role_name' => 'Guest User'],
            ['role_name' => 'Registered Admin'],
            ['role_name' => 'Store Admin'],
            ['role_name' => 'Accountant'],
            ['role_name' => 'Packing Staff'],
           
        ];

        foreach ($roles as $role) {
            Roles::create($role);
        }
    }
}
