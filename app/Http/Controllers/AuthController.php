<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Afficher la page Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Traiter le Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('student.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
