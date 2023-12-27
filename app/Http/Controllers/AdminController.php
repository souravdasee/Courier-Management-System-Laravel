<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::latest()->orderBy('id', 'desc')->Paginate(10);

        return view('admin.index', [
            'users' => $user
        ]);
    }

    public function create()
    {
        $role = Role::all();

        return view('admin.create', [
            'roles' => $role
        ]);
    }

    public function store(Request $req)
    {
        request()->validate([
            'name' => 'required | string | max:255 ',
            'role' => 'required | string ',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | min:4 | max:127'
        ]);

        $user = new User();

        $user->name = $req->name;
        $user->role = $req->role;
        $user->email = $req->email;
        $user->password = $req->password;

        $user->save();
        return redirect('users');
    }

    public function show($id)
    {
        $user = User::find($id);
        $role = Role::all();

        return view('admin.show', [
            'users' => $user,
            'roles' => $role
        ]);
    }

    public function update(Request $req)
    {
        $update = User::find($req->id);

        request()->validate([
            'name' => 'required | string | max:255 ',
            'role' => 'required | string ',
            'email' => ['required', Rule::unique('users')->ignore($update->id)]
        ]);

        $update->name = $req->name;
        $update->role = $req->role;
        $update->email = $req->email;

        $update->save();
        return redirect('users');
    }
}
