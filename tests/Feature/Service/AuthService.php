<?php

namespace Tests\Feature\Service;

use App\Service\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

}
