<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Service\PostService;

class PostController extends Controller
{
    private $postService;
    
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(FilterRequest $request) {
        $filter = $request->validated();
        $posts = $this->postService->list($filter);
        return response()->json([
            'result' => $posts,
            'errors' => null,
        ], 200);
    }

    public function create(StoreRequest $request) {
        $this->postService->create($request->validated());
        return response()->json([
            'result' => 'Created',
            'errors' => null,
        ], 201);
    }

    public function show($post_id) {
        $post = $this->postService->findOne($post_id);
        return response()->json([
            'result' => $post,
            'errors' => null,
        ], 200);
    }

    public function update(StoreRequest $request, $post_id) {
        $this->postService->update($request->validated(), $post_id);
        return response()->json([
            'result' => 'Updated',
            'errors' => null,
        ], 200);
    }

    public function publish($post_id) {
        $this->postService->publish($post_id);
        return response()->json([
            'result' => 'Updated',
            'errors' => null,
        ], 200);
    }

    public function delete($post_id) {
        $this->postService->delete($post_id);
        return response()->json([
            'result' => 'Deleted',
            'errors' => null,
        ], 200);
    }
}
