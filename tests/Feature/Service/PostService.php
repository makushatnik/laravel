<?php

namespace Tests\Feature\Service;

use App\Service\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

}
