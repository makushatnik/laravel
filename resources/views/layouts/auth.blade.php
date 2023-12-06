@extends('layouts.base')

@section('content')
<section>
    <x-container>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <x-card>
                    <x-card-header>
                        <x-card-title>
                            @yield('auth.card-title')
                        </x-card-title>
                    </x-card-header>

                    <x-card-body>
                        @yield('auth.card-body')
                    </x-card-body>
                </x-card>
            </div>
        </div>
    </x-container>
</section>
@endsection