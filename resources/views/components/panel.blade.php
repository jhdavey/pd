@php
    $classes = 'p-1 bg-white/5 rounded-xl border border-transparent hover:border-gray-800 group transition-colors duration-200';
@endphp

<div {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</div>