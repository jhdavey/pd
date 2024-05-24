@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'mt-1 rounded-xl bg-white/10 border border-white/10 px-4 py-2 w-full placeholder:text-white/10',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes->merge($defaults) }}>
</x-forms.field>
