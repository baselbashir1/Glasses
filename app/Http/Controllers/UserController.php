<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users', ['only' => ['index']]);
        $this->middleware('permission:add user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::all();
        return view('pages.users.list', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all();
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
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'image' => isset($formFields['image']) ? $formFields['image'] : null,
            'role' => $formFields['role']
        ]);
        $user->assignRole($formFields['role']);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('pages.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(UserRequest $request, User $user)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $user->update([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'image' => isset($formFields['image']) ? $formFields['image'] : $user->image,
            'role' => $formFields['role']
        ]);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($formFields['role']);

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
