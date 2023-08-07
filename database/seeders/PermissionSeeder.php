<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dossiers',
            'add dossier',
            'edit dossier',
            'delete dossier',
            'agents',
            'add agent',
            'edit agent',
            'delete agent',
            'products',
            'add product',
            'edit product',
            'delete product',
            'users',
            'add user',
            'edit user',
            'delete user',
            'roles',
            'add role',
            'edit role',
            'delete role'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
