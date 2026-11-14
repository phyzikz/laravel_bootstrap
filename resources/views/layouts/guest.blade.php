<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="{{ filter_var(env('BS_LIGHTMODE', false), FILTER_VALIDATE_BOOLEAN) ? 'light' : 'dark' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/js/app.js'])
        {!! ToastMagic::styles() !!}
    </head>
    <body class="bg-body-secondary">
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-4 px-3">
            <div class="mb-4">
                <a href="/" class="text-decoration-none text-body">
                    <x-application-logo style="width: 5rem; height: 5rem;" />
                </a>
            </div>

            <div class="card shadow-sm w-100" style="max-width: 28rem;">
                <div class="card-body p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
        {!! ToastMagic::scripts() !!}
    </body>
</html>
