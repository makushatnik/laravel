@extends('layouts.auth')

@section('title', 'Login Page')
@section('auth.card-title', 'Login')

@section('auth.card-body')
<x-form action="{{ route('login') }}">
    <x-form-item>
        <x-label required>{{ __('Email') }}</x-label>
        <x-input type="email" name="email" autofocus/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Password') }}</x-label>
        <x-input type="password" name="password" />
    </x-form-item>

    <x-form-item>
        <x-checkbox name="remember" id="remember" checked>
            {{ __('Remember me') }}
        </x-checkbox>
    </x-form-item>

    <x-button type="submit">
        {{ __('Login') }}
    </x-button>
</x-form>
@endsection