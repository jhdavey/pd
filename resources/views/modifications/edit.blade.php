@php
$build = request()->route('build');

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
    <x-page-heading>Edit Modification</x-page-heading>

    @if (session('status'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('status') }}</span>
    </div>
    @endif

    @include('errors.validation-errors')

    @if ($modification->images->isNotEmpty())
    <div class="max-w-2xl mx-auto">
        <x-section-heading>Current Images</x-section-heading>
        <div class="mt-4 grid grid-cols-6 gap-4">
            @foreach ($modification->images as $image)
            <div class="relative">
                <img src="{{ Storage::url($image->image_path) }}" alt="Modification Image" class="w-full h-auto rounded">
                <form action="{{ route('mods.deleteImage', $image->id) }}" method="POST" class="absolute top-0 right-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white p-1 rounded">X</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <x-forms.form method="POST" action="{{ route('mods.update', ['build' => $modification->build_id, 'modification' => $modification->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input type="hidden" name="build_id" value="{{ $build->id }}">

        <x-forms.select label="Category*" name="category" :options="$categories" value="{{ old('category', $modification->category) }}" />
        <x-forms.input label="Brand*" name="brand" placeholder="Greddy" value="{{ old('brand', $modification->brand) }}" />
        <x-forms.input label="Name*" name="name" placeholder="Intercooler" value="{{ old('name', $modification->name) }}" />
        <x-forms.input label="Price" name="price" placeholder="489.99" type="number" step="0.01" value="{{ old('price', $modification->price) }}" />
        <x-forms.input label="Part Number" name="part" placeholder="45x215gh6" type="text" value="{{ old('part', $modification->part) }}" />
        <x-forms.text-area label="Notes" name="notes" placeholder="GTS" value="{{ old('notes', $modification->notes) }}" />
        <x-forms.input label="Add Images" name="images[]" type="file" multiple />
        <p class="italic text-sm">Max size 10MB</p>

        <p class="text-sm italic text-white">You can upload up to 6 images for this modification.</p>

        @if ($errors->has('images'))
        <p class="text-red-500 text-sm mt-2">{{ $errors->first('images') }}</p>
        @endif

        <x-forms.divider />

        <div class="flex justify-end items-center max-w-2xl mx-auto gap-x-6 mt-6">
            <button form="delete-form" class="font-bold text-sm text-red-500">Delete</button>
            <a href="{{ route('builds.show', $build) }}" type="button" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Cancel</a>
            <x-forms.button type="submit">Update</x-forms.button>
        </div>
    </x-forms.form>

    <form name="delete-form" method="POST" action="{{ route('mods.destroy', ['build' => $build->id, 'modification' => $modification->id]) }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-layout>