@props(['label', 'name', 'options' => [], 'value' => null])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full'
    ];
@endphp

<x-forms.field :$label :$name>
    <select {{ $attributes($defaults) }}>
        <option value="" class="bg-background">Select a category</option>
        @foreach ($options as $option)
            <option class="bg-background" value="{{ $option }}" {{ $option == $value ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
</x-forms.field>