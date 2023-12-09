<?php

namespace App\Service;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class PostService {

    public function list(array $filter): LengthAwarePaginator {
        $posts = Post::latest('published_at')->paginate(config('pageSize'), ['id', 'title', 'published_at']);
        return $posts;
    }

    public function findOne($post_id): Post {
        $post = Post::where('author', Auth::id())
                    ->findOrFail($post_id, ['id', 'title', 'content', 'published_at', 'created_at', 'updated_at']);
        return $post;
    }

    public function create(array $data): Post {
        return Post::firstOrCreate([
            'author'       => Auth::id(),
            'title'        => $data['title'],
        ], [
            'content'      => $data['content'],
            'published_at' => new Carbon($data['published_at']) ?? null,
        ]);
    }

    public function update(array $data, $post_id): bool {
        $post = Post::where('author', Auth::id())->findOrFail($post_id, ['id', 'title', 'published_at']);
        if ($post) {
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->published_at = new Carbon($data['published_at']) ?? null;
            $post->save();
            return true;
        }
        return false;
    }

    public function publish($post_id): bool {
        $post = Post::where('author', Auth::id())->findOrFail($post_id, ['id', 'title', 'published_at']);
        if ($post) {
            $post->published_at = new Carbon(now());
            $post->save();
            return true;
        }
        return false;
    }

    public function delete($post_id): bool {
        $post = Post::where('author', Auth::id())->findOrFail($post_id, ['id', 'title', 'published_at']);
        if ($post) {
            $post->delete();
            return true;
        }
        return false;
    }
}