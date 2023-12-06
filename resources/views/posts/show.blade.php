@extends('layouts.main')

@section('title', $post->title)

@section('main.content')
<x-title>
    {{ $post->title }}

    <x-slot name="link">
        <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>
    </x-slot>

    <x-slot name="right">
        <a href="{{ route('posts.edit', $post->id) }}">
            <x-button size="sm" color="success">
                {{ __('Edit') }}
            </x-button>
        </a>
    </x-slot>
</x-title>

<p>
    {{ $post->content }}
</p>
@endsection