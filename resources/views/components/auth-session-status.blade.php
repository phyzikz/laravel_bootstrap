@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert theme-success']) }}>
        {{ $status }}
    </div>
@endif
