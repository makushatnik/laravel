<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        $categories = [null => __('All') ];

        $post = (object) [
            'id' => 123,
            'title' => 'Post title',
            'content' => 'zdfsdgdfgdffffffffffffffsdfs'
        ];
        $posts = array_fill(0, 10, $post);
        return view('posts.index', compact('posts', 'categories'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(StorePostRequest $request, $post) {
        $validated = $request->validated();

        return redirect()->route('posts.index');
    }

    public function show($post_id) {
        $post = (object) [
            'id' => 123,
            'title' => 'Post title',
            'content' => 'zdfsdgdfgdffffffffffffffsdfs'
        ];
        return view('posts.show', compact('post'));
    }

    public function edit($post_id) {
        $post = (object) [
            'id' => 123,
            'title' => 'Post title',
            'content' => 'zdfsdgdfgdffffffffffffffsdfs'
        ];
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $post_id) {
        $title = $request->input('title');
        $content = $request->content('content');

        return redirect()->back();
    }

    public function delete($post_id) {

        return redirect()->route('posts.index');
    }
}
