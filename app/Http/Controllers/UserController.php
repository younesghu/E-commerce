<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

     // Show register form
     public function create(Request $request){
        return view('users.register');
    }

    // Create new User
    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
            'phone' => 'required|string|min:8|max:11'
        ]);
        // Hash Password
        $data['password'] = bcrypt($data['password']);

        // Create User
        $user = User::create($data);

        // Then Login
        auth()->login($user);

        return redirect('/')->with('message', 'User Created and logged in');
    }



    // Logout User
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

     // Login Form
     public function login(Request $request){
        return view('users.login');
    }

    // Authenticate User
    public function Authenticate(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($data)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
