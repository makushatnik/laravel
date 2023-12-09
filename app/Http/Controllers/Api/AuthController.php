<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function login(LoginRequest $request) {
        if ($this->authService->login($request->validated())) {
            $request->session()->regenerate();
            alert('Welcome!');

            return response()->json([
                'result' => ['token' => '1234abc'],
                'errors' => null,
            ], 200);
        }

        return response()->json([
            'result' => [],
            'errors' => 'The provided credentials do not match our records.',
        ], 404);
    }

    public function register(SignupRequest $request) {
        if ($this->authService->createUser($request->validated())) {
            $request->session()->regenerate();
            alert('You\'ve been registered successfully!!');

            return response()->json([
                'result' => 'Created',
                'errors' => null,
            ], 201);
        }

        return response()->json([
            'result' => [],
            'errors' => 'The user input error.',
        ], 401);
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        alert('Your password had been stolen!');

        return response()->json([
            'result' => 'Created',
            'errors' => null,
        ], 200);
    }
}
