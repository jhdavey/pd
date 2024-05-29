@php
$categories = [
    'Accessories',
    'Audio',
    'Body Kits',
    'Brakes',
    'Cooling',
    'Electrical',  // Missing comma added here
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

    <x-forms.form method="POST" action="{{ route('mods.store', $build) }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="build_id" value="{{ $build->id }}">

        <x-forms.select label="Category*" name="category" :options="$categories" />
        <x-forms.input label="Brand*" name="brand" placeholder="Greddy" />
        <x-forms.input label="Name*" name="name" placeholder="Intercooler" />
        <x-forms.input label="Price" name="price" placeholder="489.99" type="number" />
        <x-forms.input label="Part Number" name="part" placeholder="45x215gh6" type="text" />
        <x-forms.input label="Notes" name="notes" placeholder="any notes about your modification can go here..." type="textarea" />
        <x-forms.input label="Images" name="images[]" type="file" multiple />
        <x-forms.divider />

        <x-forms.button>Save Modification</x-forms.button>
    </x-forms.form>
</x-layout>
