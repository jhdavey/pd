@php
$categories = [
'Accessories',
'Audio',
'Body Kits',
'Brakes',
'Cooling',
'Electrical',
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

        <!-- Display Validation Errors -->
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Whoops!</strong> There were some problems with your input.
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <input type="hidden" name="build_id" value="{{ $build->id }}">

        <x-forms.select label="Category*" name="category" :options="$categories" />
        <x-forms.input label="Brand*" name="brand" placeholder="Greddy" />
        <x-forms.input label="Name*" name="name" placeholder="Intercooler" />
        <x-forms.input label="Price" name="price" placeholder="489.99" type="number" step="0.01" />
        <x-forms.input label="Part Number" name="part" placeholder="45x215gh6" type="text" />
        <x-forms.input label="Notes" name="notes" placeholder="any notes about your modification can go here..." type="textarea" />

        <x-forms.input label="Images" name="images[]" type="file" multiple />
        <p class="italic text-sm">Max size 10MB</p>
        <p class="text-sm italic">You can upload up to 6 images for this modification.</p>

        @if ($errors->has('images'))
        <p class="text-red-500 text-sm mt-2">{{ $errors->first('images') }}</p>
        @endif

        <x-forms.divider />

        <x-forms.button>Save Modification</x-forms.button>
    </x-forms.form>
</x-layout>