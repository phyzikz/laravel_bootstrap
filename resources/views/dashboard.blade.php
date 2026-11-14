<x-app-layout>
    <x-slot name="header">
        <h1 class="h4 mb-0">{{ __('Dashboard') }}</h1>
    </x-slot>

    <div class="container pb-5">
        <div class="card shadow-sm">
            <div class="card-body">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</x-app-layout>
