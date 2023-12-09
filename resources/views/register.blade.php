@extends('layouts.auth')

@section('title', 'Register Page')
@section('auth.card-title', 'Register')

@section('auth.card-body')
<x-form action="{{ route('register') }}">
    <x-form-item>
        <x-label required>{{ __('Name') }}</x-label>
        <x-input name="name" autofocus/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Email') }}</x-label>
        <x-input type="email" name="email" />
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Password') }}</x-label>
        <x-input type="password" name="password" />
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Password confirmation') }}</x-label>
        <x-input type="password" name="password_confirmation" />
    </x-form-item>

    <x-form-item>
        <x-checkbox name="agreement" checked>
            {{ __('I agree to the processing of personal data') }}
        </x-checkbox>
    </x-form-item>

    <x-button type="submit">
        {{ __('Register') }}
    </x-button>
</x-form>
@endsection