<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = (object) [
            'id' => 123,
            'title' => 'Post title',
            'content' => 'zdfsdgdfgdffffffffffffffsdfs'
        ];
        $posts = array_fill(0, 10, $post);
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request, $post) {
        return 'Stored!';
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
        return 'Updated!';
    }

    public function delete($post_id) {
        return 'Deleted!';
    }
}
