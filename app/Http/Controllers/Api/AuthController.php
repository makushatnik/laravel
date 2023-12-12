<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
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

    public function login(Request $request) {
        if ($this->authService->login($request->all())) {

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

    public function register(Request $request) {
        if ($this->authService->createUser($request->all())) {

            return response()->json([
                'result' => 'Created',
                'errors' => null,
            ], 201);
        }

        return response()->json([
            'result' => [],
            'errors' => 'The user input error.',
        ], 405);
    }

    public function logout(Request $request) {
        // auth()->user()->tokens()->delete();
        // auth()->user()->logout();
        Auth::logout();

        return response()->json([
            'result' => 'Successfully logged out',
            'errors' => null,
        ], 200);
    }
}
