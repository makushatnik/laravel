<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link(string $name): string {
        return Route::is($name) ? 'active' : '';
    }
}

if (!function_exists('alert')) {
    function alert(string $text, string $type = 'success') {
        session(['alert' => __($text), 'alert_type' => __($type)]);
    }
}

if (!function_exists('validate')) {
    function validate(array $attributes, array $rules): array {
        return validator($attributes, $rules)->validate();
    }
}