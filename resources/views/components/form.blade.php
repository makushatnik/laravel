@props(['method' => 'POST'])

@php($method = strtoupper($method))
@php($_method = in_array($method, ['GET', 'POST']))

<form {{ $attributes }} method="{{ $_method ? $method : 'POST' }}">
    @if($method !== 'GET')
        @csrf
    @endif

    @if(!$_method)
        @method($method)
    @endif

    {{ $slot }}
</form>