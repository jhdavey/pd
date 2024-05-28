@php
$build = request()->route('build');

$categories = [
    'Accessories',
    'Audio',
    'Body Kits',
    'Brakes',
    'Cooling',
    'Electrical'
    'Engine Components',
    'Engine Management',
    'Exhaust',
    'Exterior',
    'Fuel',
    'Interior',
    'Lighting',
    'Performance',
    'Suspension',
    'Tires & Wheels',
    'Transmission',
    'Other'
];
@endphp

<x-layout>
    <x-page-heading>Add Modification</x-page-heading>

    <x-forms.form method="POST" action="/mods/" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="build_id" value="{{ $build }}">

        <x-forms.select label="Category*" name="category" :options="$categories" />
        <x-forms.input label="Brand*" name="brand" placeholder="Greddy" />
        <x-forms.input label="Name*" name="name" placeholder="Intercooler" />
        <x-forms.input label="Price" name="price" placeholder="489.99" type="integer" />
        <x-forms.input label="Part Number" name="part" placeholder="45x215gh6" type="string" />
        <x-forms.input label="Notes" name="notes" placeholder="GTS" type="textarea" />

        <x-forms.divider />

        <!-- <x-forms.checkbox label="Submit to be featured" name="featured" /> -->

        <x-forms.button>Save Modification</x-forms.button>

    </x-forms.form>
</x-layout>