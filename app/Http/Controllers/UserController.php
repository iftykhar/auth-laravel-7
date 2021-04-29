<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function authenticate(Request $request)//this is for login of the user
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
    public function index()
    {

    }

    public function create()//registration form in this page
    {
        return view('users.create',['users'=>User::all()]);
    }

    public function store(Request $request)//this is the function that registers
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'unique:users,email', 'email', 'max:255'],
            'password' => ['required', 'min:6','max:255', 'confirmed'],
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        User::create( $attributes);

        $request->session()->flash('message', 'User has been created.');
        return redirect()->route('user.create');
    }

    public function show(User $user)
    {
//        $user = User::findOrFail($id);
        return view('users.show',['user'=>$user]);
    }

    public function edit(User $user)
    {
        return view('users.edit',['user'=>$user]);
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'unique:users,email', 'email', 'max:255'],
            'password' => ['required', 'min:6','max:255', 'confirmed'],
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user->update( $attributes);

        $request->session()->flash('message', 'User has been Updated.');
        return redirect()->route('user.create');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
