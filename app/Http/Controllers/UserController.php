<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('pages.users.add');
    }

    public function store(UserRequest $request)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        User::create([
            'name' => $formFields['name'],
            'phone' => $formFields['phone'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'image' => isset($formFields['image']) ? $formFields['image'] : null
        ]);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', ['user' => $user]);
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

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
