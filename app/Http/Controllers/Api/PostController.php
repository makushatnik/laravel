<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\PostService;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    private $postService;
    
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request) {
        $posts = $this->postService->list($request->all());
        return response()->json([
            'result' => $posts,
            'errors' => null,
        ], 200);
    }

    public function create(Request $request) {
        $this->postService->create($request->all());
        return response()->json([
            'result' => 'Created',
            'errors' => null,
        ], 201);
    }

    public function show($post_id) {
        $post = $this->postService->findOne($post_id);
        if (empty($post)) {
            return response()->json([
                'result' => null,
                'errors' => 'Not Found!',
            ], 404);
        }

        return response()->json([
            'result' => $post,
            'errors' => null,
        ], 200);
    }

    public function update(Request $request, $post_id) {
        $this->postService->update($request->all(), $post_id);
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
        ], 204);
    }
}
