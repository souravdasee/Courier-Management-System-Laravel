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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();

        return view('admin.create', [
            'roles' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $user = new User();

        $user->name = $req->name;
        $user->role = $req->role;
        $user->email = $req->email;
        $user->password = $req->password;

        $user->save();
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::latest()->orderBy('id', 'desc')->Paginate(10);

        return view('admin.show', [
            'users' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
