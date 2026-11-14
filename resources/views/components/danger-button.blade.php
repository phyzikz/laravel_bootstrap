<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-solid theme-danger']) }}>
    {{ $slot }}
</button>
