<x-card>
    <x-card-body>
        <h2 class="h6">
            <a href="{{ route('posts.show', $post->id) }}">
                {{ $post->title }}
            </a>
        </h2>
        
        <div class="small text-muted">
            {{ $post->published_at->format('d.m.Y H:i:s') }}
        </div>
    </x-card-body>
</x-card>