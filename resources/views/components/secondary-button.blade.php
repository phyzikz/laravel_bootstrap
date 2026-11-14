<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-outline theme-secondary']) }}>
    {{ $slot }}
</button>
