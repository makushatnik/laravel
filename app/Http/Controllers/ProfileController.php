<?php

namespace App\Http\Controllers;

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
        return view('profile', compact('user'));
    }
}
