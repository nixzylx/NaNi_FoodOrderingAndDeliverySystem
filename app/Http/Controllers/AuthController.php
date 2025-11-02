<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle login form submission
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['user' => $user]);

            // Redirect all users to their dashboard
            return redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Invalid email or password');
    }

    /**
     * Handle logout
     */
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }

    /**
     * Show registration form
     */
    public function registerForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a new user (no role)
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully! You can now log in.');
    }
}
