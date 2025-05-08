<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $data = User::latest()->paginate(5);
        return view('users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        //dd($request->input());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        $user->syncRoles($request->roles);
        return redirect()->route('users.index')->with('success', 'User created');
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->syncRoles($request->roles);
        return redirect()->route('users.index')->with('success', 'User updated');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted');
    }
}
