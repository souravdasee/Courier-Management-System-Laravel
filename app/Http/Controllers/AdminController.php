<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Location;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::latest()->filter(request(['search']))->paginate(10)->withQueryString();

        return view('admin.index', [
            'users' => $user
        ]);
    }

    public function create()
    {
        $role = Role::all();
        $location = Location::all();

        return view('admin.create', [
            'roles' => $role,
            'locations' => $location
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
        $user->city = $req->city;
        $user->email = $req->email;
        $user->password = $req->password;

        $user->save();
        return redirect('users')->with('success', 'New user created');
    }

    public function show($id)
    {
        $user = User::find($id);
        $role = Role::all();
        $location = Location::all();

        return view('admin.show', [
            'users' => $user,
            'roles' => $role,
            'locations' => $location
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
        return redirect('users')->with('success', 'User details updated');
    }
}
