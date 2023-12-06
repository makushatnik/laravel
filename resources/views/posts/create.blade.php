@extends('layouts.main')

@section('title', 'Create Post')

@section('main.content')
<x-title>
    {{ __('Create Post') }}

    <x-slot name="link">
        <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>
    </x-slot>
</x-title>

<x-post.form action="{{ route('posts.store') }}" btn_title="Create"/>
@endsection