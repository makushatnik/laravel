<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        $categories = [null => __('All') ];

        $posts = Post::latest('published_at')->paginate(config('pageSize'), ['id', 'title', 'published_at']);

        return view('posts.index', compact('posts', 'categories'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(StorePostRequest $request) {
        $validated = $request->validated();
        $post = $this->createPost($validated);
        alert("Post with ID - {$post->id} was created or found.");

        return redirect()->route('posts.index');
    }

    public function show($post_id) {
        $post = Post::where('author', Auth::id())->findOrFail($post_id, ['id', 'title', 'published_at']);
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

    public function update(StorePostRequest $request, $post_id) {
        $validated = $request->validated();

        return redirect()->back();
    }

    public function delete($post_id) {
        
        return redirect()->route('posts.index');
    }

    private function createPost(array $validated) {
        return Post::firstOrCreate([
            'author'       => Auth::id(),
            'title'        => $validated['title'],
        ], [
            'content'      => $validated['content'],
            'published_at' => new Carbon($validated['published_at']) ?? null,
        ]);
    }
}
