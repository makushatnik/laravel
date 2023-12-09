<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\UserService;

class ProfileController extends Controller
{
    private $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show() {
        $user = $this->userService->getProfile();
        return response()->json([
            'result' => $user,
            'errors' => null,
        ], 200);
    }
}
