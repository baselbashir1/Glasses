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
            'delete role',
            'invoices',
            'add invoice',
            'edit invoice',
            'delete invoice'
        ];

        // $role = Role::where('name', 'admin')->first();
        foreach ($permissions as $permission) {
            $permission = Permission::create(['name' => $permission]);
            // DB::table('role_has_permissions')->create([
            //     'role_id' => $role->id,
            //     'permission_id' => $permission->id
            // ]);
        }
    }
}
