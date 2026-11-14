@props([
    'name',
    'show' => false,
])

<div
    x-data="{ show: @js($show) }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-hidden');
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center p-3"
    style="display: {{ $show ? 'flex' : 'none' }}; z-index: 1050;"
>
    <div
        x-show="show"
        class="position-fixed top-0 start-0 w-100 h-100"
        style="background: rgba(0, 0, 0, 0.5);"
        x-on:click="show = false"
    ></div>

    <div
        x-show="show"
        class="card shadow-lg position-relative w-100"
        style="max-width: 32rem; z-index: 1051;"
    >
        {{ $slot }}
    </div>
</div>
