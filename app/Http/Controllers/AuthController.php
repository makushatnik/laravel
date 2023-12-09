<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_form() {
        return view('login');
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();
        if ($this->authenticate($request, $data, 'Welcome!')) {
            return redirect()->intended('profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register_form() {
        return view('register');
    }

    public function register(SignupRequest $request) {
        $data = $request->validated();

        $user = User::create([
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'active'   => true,
            'name'     => $data['name'],
        ]);

        if ($user) {
            if ($this->authenticate($request, $data, 'You\'ve been registered successfully!!')) {
                return redirect()->intended('profile');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        alert('Your password had been stolen!');

        return view('home');
    }

    private function authenticate(Request $request, array $data, string $msg): bool {
        if (Auth::attempt([
            'email'    => $data['email'],
            'password' => $data['password'],
            'active'   => true,
        ], isset($data['remember']) ? true : false )) {
            $request->session()->regenerate();
            alert($msg);
            return true;
        }

        return false;
    }
}
