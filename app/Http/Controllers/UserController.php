<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //views
    public function register()
    {
        return view("register");
    }


    //register
    public function registerUser(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user from user model
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // You may optionally log in the user here

        // Redirect or return a response
        return redirect('/')->with('success', 'User registered successfully!');
    }




    //loginView
    public function login()
    {
        return view('login');
    }
    //login
    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();
            return redirect('/dashboard')->with('name', $request->name);
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }


    //to dashboard
    public function dashboard()
    {
        $name = session('name');
        return view('dashboard', compact('name'));
    }
}
