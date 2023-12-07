<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link(string $name): string {
        return Route::is($name) ? 'active' : '';
    }
}

if (!function_exists('alert')) {
    function alert(string $text) {
        session(['alert' => __($text)]);
    }
}

if (!function_exists('validate')) {
    function validate(array $attributes, array $rules): array {
        return validator($attributes, $rules)->validate();
    }
}