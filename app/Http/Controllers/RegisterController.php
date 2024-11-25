<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    //store user data from registration form
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'phone' =>'required|numeric|min:10',
            'password' => 'required|min:8',
        ]);

        // Hash the password before storing it in the database
        $password = Hash::make($request->password);

        // Create a new user with the validated data and hashed password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password,
            'role' => $request->role ?? 'member',
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('login');
    }
}
