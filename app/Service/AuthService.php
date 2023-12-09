<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService {

    public function login(array $data): bool {
        if (Auth::attempt([
            'email'    => $data['email'],
            'password' => $data['password'],
            'active'   => true,
        ], isset($data['remember']) ? true : false )) {
            return true;
        }

        return false;
    }

    public function createUser(array $data): bool {
        $user = User::create([
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'active'   => true,
            'name'     => $data['name'],
        ]);

        if ($user) {
            if ($this->login($data)) {
                return true;
            }
        }
        return false;
    }
}