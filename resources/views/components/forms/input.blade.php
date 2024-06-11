@props(['label', 'name', 'type' => 'text', 'rows' => 4])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'mt-1 rounded-xl bg-white/10 border border-white/10 px-4 py-2 w-full placeholder:text-white/10',
        'value' => old($name)
    ];
@endphp

<x-forms.field :label="$label" :name="$name">
    @if($type === 'textarea')
        <textarea {{ $attributes->merge($defaults) }} rows="{{ $rows }}">{{ old($name) }}</textarea>
    @else
        <input type="{{ $type }}" {{ $attributes->merge($defaults) }}>
    @endif
</x-forms.field>
