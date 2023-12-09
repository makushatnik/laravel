<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form() {
        return view('login');
    }

    public function login(LoginRequest $request) {
        
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        if ($validated['remember']) {
            session(['user' => '']);
        }

        alert('Welcome');

        return redirect('/profile');
    }

    public function register_form() {
        return view('register');
    }

    public function register(SignupRequest $request) {
        
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        alert('You\'ve been registered successfully!');

        return redirect('/profile');
    }

    public function logout(Request $request) {
        $request->user()->logout();

        alert('Your password had been stolen!');

        return view('home');
    }
}
