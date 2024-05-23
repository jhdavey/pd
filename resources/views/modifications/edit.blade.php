@php
$build = request()->route('build');

$categories = [
    'Engine',
    'Cooling',
    'Suspension',
    'Brakes',
    'Fuel',
    'Transmission',
    'Exhaust',
    'Interior',
    'Exterior',
    'Electrical',
    'Tires & Wheels',
    'Body Kits',
    'Lighting',
    'Audio',
    'Performance'
];
@endphp

<x-layout>
    <x-page-heading>Edit Modification</x-page-heading>

    <x-forms.form method="POST" action="/mods/{{ $modification->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input type="hidden" name="build_id" value="{{ $build }}">

        <x-forms.select label="Category*" name="category" :options="$categories" value="{{ $modification->category }}" />
        <x-forms.input label="Brand*" name="brand" placeholder="Greddy" value="{{ $modification->brand }}" />
        <x-forms.input label="Name*" name="name" placeholder="Intercooler" value="{{ $modification->name }}"/>
        <x-forms.input label="Price" name="price" placeholder="489.99" type="integer" value="{{ $modification->price }}" />
        <x-forms.input label="Part Number" name="part" placeholder="45x215gh6" type="string" value="{{ $modification->part }}" />
        <x-forms.input label="Notes" name="notes" placeholder="GTS" type="textarea" value="{{ $modification->notes }}" />

        <x-forms.divider />

        <!-- Delete, Cancel, Edit buttons -->
        <div class="flex justify-end items-center max-w-2xl mx-auto gap-x-6 mt-6">
            <button form="delete-form" class="font-bold text-sm text-red-500">Delete</button>
            <a href="/mods/{{ $modification->id }}" type="button" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Cancel</a>
            <x-forms.button type="submit">Update</x-forms.button>
        </div>
    </x-forms.form>

    <form name="delete-form" method="POST" action="/mods/{{ $modification->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
