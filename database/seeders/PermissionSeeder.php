<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
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
            'view dossier',
            'add dossier',
            'edit dossier',
            'delete dossier',
            'agents',
            'view agent',
            'add agent',
            'edit agent',
            'delete agent',
            'products',
            'view product',
            'add product',
            'edit product',
            'delete product',
            'users',
            'view user',
            'add user',
            'edit user',
            'delete user',
            'roles',
            'view role',
            'add role',
            'edit role',
            'delete role',
            'invoices',
            'view invoice',
            'add invoice',
            'edit invoice',
            'delete invoice'
        ];

        $role = Role::where('name', 'admin')->first();
        foreach ($permissions as $per) {
            $permission = Permission::create(['name' => $per]);
            $role->givePermissionTo($permission);
        }
    }
}
