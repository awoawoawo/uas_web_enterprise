<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showWelcome()
    {
        return view('auth.welcome');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'email' => $request->email,
            'hashed_password' => hash('sha256', $request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || hash('sha256', $request->password) !== $user->hashed_password) {
            return back()->withErrors([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function showDashboard()
    {
        return view('dashboard.index');
    }

    public function showUser()
    {
        return view('dashboard.user');
    }

    public function showJurnal()
    {
        return view('dashboard.jurnal');
    }
}
