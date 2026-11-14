<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="{{ filter_var(env('BS_LIGHTMODE', false), FILTER_VALIDATE_BOOLEAN) ? 'light' : 'dark' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/js/app.js'])
        {!! ToastMagic::styles() !!}
    </head>
    <body class="bg-body-secondary">
        <div class="min-vh-100 d-flex flex-column">
            <nav class="navbar bg-body border-bottom">
                <div class="container d-flex justify-content-between align-items-center">
                    <span class="navbar-brand mb-0 h1">{{ config('app.name', 'Laravel') }}</span>
                    @if (Route::has('login'))
                        <div class="d-flex gap-2">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-outline theme-primary">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn-text theme-primary">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-solid theme-primary">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </nav>

            <main class="container py-5 flex-grow-1">
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h3 mb-3">Laravel 13 + Bootstrap 6</h1>
                        <p class="text-body-secondary mb-4">
                            This starter uses Laravel Breeze for authentication and Bootstrap 6.0.0-alpha.1 as the default UI.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="https://laravel.com/docs" class="btn-outline theme-secondary" target="_blank" rel="noopener">Documentation</a>
                            <a href="https://laracasts.com" class="btn-outline theme-secondary" target="_blank" rel="noopener">Laracasts</a>
                            <a href="{{ route('demo') }}" class="btn-outline theme-secondary">Demo</a>

                        </div>
                    </div>
                </div>
            </main>
        </div>
        {!! ToastMagic::scripts() !!}
    </body>
</html>
