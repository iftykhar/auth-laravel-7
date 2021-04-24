<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'unique:users,email', 'email', 'max:255'],
            'password' => ['required', 'min:6','max:255', 'confirmed'],
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create( $attributes );

        $request->session()->flash('message', 'User has been created.');
        return redirect()->route('admin.users.show', $user->id);
    }

    public function show(User $user)
    {
//        $user = User::findOrFail($id);
        return $user;
    }

}
