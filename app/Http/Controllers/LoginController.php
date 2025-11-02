<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle post-login redirection based on user role.
     */
    protected function authenticated(Request $request, $user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect('/admin/dashboard');
            case 'driver':
                return redirect('/driver/dashboard');
            default:
                return redirect('/customer/dashboard');
        }
    }
}
