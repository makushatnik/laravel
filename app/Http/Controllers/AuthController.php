<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form() {
        return view('login');
    }

    public function login(Request $request) {
        return redirect('/profile');
    }

    public function register_form() {
        return view('register');
    }

    public function register(Request $request) {
        return 'Registered!';
    }

    public function logout(Request $request) {
        $request->user()->logout();
        return view('home');
    }
}
