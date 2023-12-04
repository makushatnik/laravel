<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return 'Index';
        // return view('posts');
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request, $post) {
        return 'Stored!';
    }

    public function show($post_id) {
        return 'Show #'.$post_id;
        // return view('posts.show', ['post_id' => $post_id]);
    }

    public function edit($post_id) {
        return view('posts.edit');
    }

    public function update(Request $request, $post_id) {
        return 'Updated!';
    }

    public function delete($post_id) {
        return 'Deleted!';
    }
}
