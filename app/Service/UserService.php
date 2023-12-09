<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService {

    public function getProfile() {
        return User::find(Auth::id());
    }
}