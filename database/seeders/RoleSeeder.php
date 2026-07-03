<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'customer', 'description' => 'Regular marketplace customer'],
            ['name' => 'vendor', 'description' => 'Business seller on the marketplace'],
            ['name' => 'admin', 'description' => 'Platform administrator'],
            ['name' => 'delivery_partner', 'description' => 'Delivery rider or logistics partner'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }
    }
}