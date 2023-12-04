<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form() {
        return view('auth.login');
    }

    public function login(Request $request) {
        return redirect('/profile');
    }

    public function register_form() {
        return view('auth.register');
    }

    public function register(Request $request) {
        return 'Registered!';
    }
}
