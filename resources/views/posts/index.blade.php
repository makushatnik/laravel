@extends('layouts.main')

@section('title', 'Post List')

@section('main.content')
<x-title>
    {{ __('Post List') }}

    <x-slot name="right">
        <a href="{{ route('posts.create') }}">
            <x-button size="sm" color="success">
                {{ __('Create') }}
            </x-button>
        </a>
    </x-slot>
</x-title>

@include('posts.filter')

@if(empty($posts))
    {{ __('No Posts yet.') }}
@else
    <div class="row">
    @foreach($posts as $post)
        <div class="col-12 col-md-4">
            <x-post.card :post="$post"/>
        </div>
    @endforeach
    </div>
@endif
@endsection