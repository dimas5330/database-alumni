<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'login' => 'Email atau password tidak valid',
            ])->withInput($request->only('email')); // Biarkan email tetap terisi
        }

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->role == 'member') {
                $request->session()->regenerate();
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'error' => 'Login failed'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
