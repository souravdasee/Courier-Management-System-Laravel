<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Validation\Rules\Password;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required | email ',
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
        request()->validate([
            'name' => 'required | string | max:255 ',
            'role' => 'required | string ',
            'email' => 'required | email '
        ]);

        $update = User::find($req->id);

        $update->name = $req->name;
        $update->role = $req->role;
        $update->email = $req->email;

        $update->save();
        return redirect('users');
    }
}
