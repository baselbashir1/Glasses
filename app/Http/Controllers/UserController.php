<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.list', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('pages.users.detail', ['user' => $user]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('pages.users.add', ['roles' => $roles]);
    }

    public function store(UserRequest $request)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $user = User::create([
            'name' => $formFields['name'],
            'phone' => $formFields['phone'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'image' => isset($formFields['image']) ? $formFields['image'] : null,
        ]);
        $user->assignRole($request->input('roles'));

        return redirect('/users');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('pages.users.edit', ['user' => $user, 'roles' => $roles, 'userRole' => $userRole]);
    }

    public function update(UserRequest $request, User $user)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $user->update([
            'name' => $formFields['name'],
            'phone' => $formFields['phone'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'image' => isset($formFields['image']) ? $formFields['image'] : $user->image
        ]);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
