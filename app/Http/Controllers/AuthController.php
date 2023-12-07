<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form() {
        return view('login');
    }

    public function login(Request $request) {
        // $data = $request->all();
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->boolean('remember');

        alert('Welcome');

        return redirect('/profile');
    }

    public function register_form() {
        return view('register');
    }

    public function register(Request $request) {
        // $data = $request->all();
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $agreement = $request->boolean('agreement');

        alert('You\'ve been registered successfully!');

        return redirect('/profile');
    }

    public function logout(Request $request) {
        $request->user()->logout();

        alert('Your password had been stolen!');

        return view('home');
    }
}
