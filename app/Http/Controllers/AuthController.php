<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Service\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login_form() {
        return view('login');
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();
        if ($this->authService->login($data)) {
            $request->session()->regenerate();
            alert('Welcome!');
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
        if ($this->authService->createUser($request->validated())) {
            $request->session()->regenerate();
            alert('You\'ve been registered successfully!!');
            return redirect()->intended('profile');
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
}
