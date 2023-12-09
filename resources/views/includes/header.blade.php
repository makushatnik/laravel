<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}" aria-current="page">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link {{ active_link('posts*') }}" aria-current="page">
                        {{ __('Posts') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ active_link('about') }}" aria-current="page">
                        {{ __('About') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                @if(Auth::check())
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link {{ active_link('profile') }}" aria-current="page">
                        {{ __('Profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link {{ active_link('logout') }}" aria-current="page">
                        {{ __('Logout') }}
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link {{ active_link('login_form') }}" aria-current="page">
                        {{ __('Login') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link {{ active_link('register_form') }}" aria-current="page">
                        {{ __('Register') }}
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>