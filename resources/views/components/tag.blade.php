@props(['tag', 'size' => 'base'])

@php
    $classes = "bg-white/10 hover:bg-white/25 rounded-xl font-bold transition-colors duration-200";
    
    if ($size === 'base') {
        $classes .= " px-4 py-2 text-sm";
    }

    if ($size === 'small') {
        $classes .= " px-3 py-2 text-2xs";
    }

@endphp

<a href="/tags/{{ $tag->name }}" class="{{ $classes }}">{{ $tag->name }}</a>