<?php

namespace App\Http\Controllers;

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
        $categories = [null => __('All') ];

        $posts = $this->postService->list($request->validated());
        return view('posts.index', compact('posts', 'categories'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(StoreRequest $request) {
        $post = $this->postService->create($request->validated());
        alert("Post with ID - {$post->id} was created or found.");

        return redirect()->route('posts.index');
    }

    public function show($post_id) {
        $post = $this->postService->findOne($post_id);
        return view('posts.show', compact('post'));
    }

    public function edit($post_id) {
        $post = $this->postService->findOne($post_id);
        return view('posts.edit', compact('post'));
    }

    public function update(StoreRequest $request, $post_id) {
        $this->postService->update($request->validated(), $post_id);
        return redirect()->route('posts.show', $post_id);
    }

    public function publish($post_id) {
        $this->postService->publish($post_id);
        return redirect()->route('posts.index');
    }

    public function delete($post_id) {
        $this->postService->delete($post_id);
        return redirect()->route('posts.index');
    }
}
