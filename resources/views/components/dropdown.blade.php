@props(['align' => 'right', 'width' => '48', 'contentClasses' => ''])

<div class="position-relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            class="menu show {{ $contentClasses }}"
            style="display: none; {{ $align === 'right' ? 'inset-inline-end: 0;' : 'inset-inline-start: 0;' }} min-width: 12rem;"
            @click="open = false">
        {{ $content }}
    </div>
</div>
