<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $users = User::where('role_as', 2)->get();
        return view('admin.main.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.main.user.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password before saving
        $user->save();

        return redirect()->route('user.index');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.main.user.edit', compact('user'));
    }
    public function update($id, Request $request)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password')); // Hash the password before saving
            $user->save();
            return redirect()->route('user.index');
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        return redirect()->route('user.index');
    }
}
