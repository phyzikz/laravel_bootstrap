<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="{{ filter_var(env('BS_LIGHTMODE', false), FILTER_VALIDATE_BOOLEAN) ? 'light' : 'dark' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Demo — {{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/js/app.js'])
        {!! ToastMagic::styles() !!}
    </head>
    <body class="bg-body-secondary">
        <div class="min-vh-100 d-flex flex-column">
            <nav class="navbar bg-body border-bottom">
                <div class="container d-flex justify-content-between align-items-center">
                    <a href="{{ url('/') }}" class="navbar-brand mb-0 h1 text-decoration-none">{{ config('app.name', 'Laravel') }}</a>
                    <a href="{{ url('/') }}" class="btn-text theme-primary">Back</a>
                </div>
            </nav>

            <main class="container py-5 flex-grow-1">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h3 mb-3">Image demo</h1>
                        <p class="text-body-secondary mb-0">
                            Original via <code>asset('img/example.png')</code>, then Intervention Image at half size and flipped upside down.
                        </p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h2 class="h5 mb-3">Original</h2>
                                {{-- Wrapper avoids BS6 card-body flex stretch upscaling the image --}}
                                <div>
                                    <img src="{{ $originalImageUrl }}" alt="Original example" class="img-fluid rounded">
                                </div>
                                <p class="text-body-secondary mt-3 mb-0">
                                    Unchanged file from <code>public/img/example.png</code>, served with <code>asset('img/example.png')</code>. Vite copies it from <code>resources/img</code> on <code>npm run dev</code> and <code>npm run build</code>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h2 class="h5 mb-3">Half size + upside down</h2>
                                <div>
                                    <img src="{{ $processedImageDataUri }}" alt="Processed example" class="img-fluid rounded">
                                </div>
                                <p class="text-body-secondary mt-3 mb-0">
                                    Intervention Image scales the width to half, then flips the image vertically so it appears upside down. The result is shown as a PNG data URI and is not saved to disk.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-body p-4">
                        <p class="mb-2">
                            <code>.env</code> is extended with two keys, also listed in <code>.env.example</code>: <code>IMAGE_DRIVER=gd</code> selects the Intervention Image driver (<code>gd</code> or <code>imagick</code>), and <code>BS_LIGHTMODE=true</code> sets the Bootstrap theme to light (<code>false</code> or omitted uses dark).
                        </p>
                        <p class="mb-2">Plugins in this starter:</p>
                        <ul class="mb-3">
                            <li><strong>Bootstrap 6.0.0-alpha.1</strong> — the UI. Compiled with Sass. <code>@floating-ui/dom</code> positions dropdowns and popovers; <code>vanilla-calendar-pro</code> powers date inputs.</li>
                            <li><strong>Laravel Breeze</strong> — Blade login, registration, and profile. It also brings Alpine.js for small bits of page behavior.</li>
                            <li><strong>Toaster Magic</strong> (<code>devrabiul/laravel-toaster-magic</code>) — the toast shown when this page loads.</li>
                            <li><strong>Intervention Image</strong> (<code>intervention/image</code>) — resize, flip, and encode images. The second picture on this page is made with it.</li>
                            <li><strong>Laravel Boost</strong> — extra tools for AI coding assistants working in this app.</li>
                        </ul>
                        <p class="mb-1">Enjoy your work.</p>
                        <p class="mb-0">Regards: Phyzikz</p>
                    </div>
                </div>
            </main>
        </div>
        {!! ToastMagic::scripts() !!}
    </body>
</html>
