<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService {

    public function getProfile() {
        $user = User::find(Auth::id());
        if (empty($user)) {
            $user = Auth::user();
            if (empty($user)) {
                $user = auth()->user();
            }
        }
        return $user;
    }
}