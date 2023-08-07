<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:roles', ['only' => ['index']]);
        // $this->middleware('permission:add role', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit role', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::all();
        return view('pages.roles.list', ['roles' => $roles]);
    }

    public function show(Role $role)
    {
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $role->id)
            ->get();
        return view('pages.roles.detail', ['role' => $role, 'rolePermissions' => $rolePermissions]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('pages.roles.add', ['permissions' => $permissions]);
    }

    public function store(RoleRequest $request)
    {
        $formFields = $request->validated();

        $role = Role::create([
            'name' => $formFields['name']
        ]);
        $role->syncPermissions($formFields['permission']);

        return redirect('/roles');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('pages.roles.edit', ['role' => $role, 'permissions' => $permissions, 'rolePermissions' => $rolePermissions]);
    }

    public function update(RoleRequest $request, Role $role)
    {
        $formFields = $request->validated();

        $role->update([
            'name' => $formFields['name']
        ]);
        $role->syncPermissions($formFields['permission']);

        return redirect('/roles');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect('/roles');
    }
}
