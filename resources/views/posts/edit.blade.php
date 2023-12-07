@extends('layouts.main')

@section('title', 'Edit Post #'.$post->id)

@section('main.content')
<x-title>
    {{ __('Edit Post #'.$post->id) }}

    <x-slot name="link">
        <a href="{{ route('posts.show', $post->id) }}">{{ __('Back') }}</a>
    </x-slot>
</x-title>

<x-post.form action="{{ route('posts.update', $post->id) }}" :post="$post" btn_title="Edit" method="put"/>
@endsection