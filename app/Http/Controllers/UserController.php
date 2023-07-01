<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        if ($request->validated()) {
            $password = $request['password'];
            $password_hash = bcrypt($password);

            User::create($request->except('password') + ['password' => $password_hash]);
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        if ($request->password) {
            $password = $request['password'];
            $password_hash = bcrypt($password);
            $user->update(['password' => $password_hash]);
        }

        $user->update($request->except('password'));

        return redirect()->route('admin.users.index')->with(['message' => 'Data user berhasil diperbarui', 'alert-type' => 'success']);
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->back()->with(['message' => 'User berhasil dihapus', 'alert-type' => 'success']);
    }
}
