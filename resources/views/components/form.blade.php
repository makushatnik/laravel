<form {{ $attributes }} method="post">
    @csrf
    {{ $slot }}
</form>