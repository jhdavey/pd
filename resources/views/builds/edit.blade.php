@php
$build_categories = [
'Classic/Antique',
'Drag',
'Drift',
'Exotic',
'Hot rod/Rat rod',
'Lowrider',
'Luxury/VIP',
'Muscle',
'Offroad/Overlander',
'Rally',
'Restomod',
'Show',
'Sleeper',
'Stanced',
'Street/daily',
'Time attack',
'Track/circuit/road race',
'Other'
];
@endphp

<x-layout>
    <x-page-heading>Edit Build: {{ $build->make }} {{ $build->model }}</x-page-heading>

    @if (session('status'))
    <div id="status-message" class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <x-forms.form method="POST" action="/builds/{{ $build->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

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

        <x-forms.input label="Year*" name="year" placeholder="1995" value="{{ $build->year }}" />
        <x-forms.input label="Make*" name="make" placeholder="Toyota" value="{{ $build->make }}" />
        <x-forms.input label="Model*" name="model" placeholder="Supra" value="{{ $build->model }}" />
        <x-forms.input label="Trim Level" name="trim" placeholder="GTS" value="{{ $build->trim }}" />
        <x-forms.select label="Category*" name="build_category" :options="$build_categories" value="{{ $build->build_category }}" />

        <x-forms.divider />

        <h1 class="text-lg font-bold">SPECS</h1>

        <x-forms.input label="HP" name="hp" placeholder="numbers only" value="{{ $build->hp }}" />
        <x-forms.input label="Wheel HP" name="whp" placeholder="numbers only" value="{{ $build->whp }}" />
        <x-forms.input label="Torque (lb-ft)" name="torque" placeholder="numbers only" value="{{ $build->torque }}" />
        <x-forms.input label="Curb Weight (lbs)" name="weight" placeholder="numbers only, no commas" value="{{ $build->weight }}" />
        <x-forms.input label="Vehicle Layout" name="vehicleLayout" placeholder="Front Engine RWD" value="{{ $build->vehicleLayout }}" />
        <x-forms.input label="Fuel Type" name="fuel" placeholder="numbers only" value="{{ $build->fuel }}" />

        <x-forms.divider />

        <h1 class="text-lg font-bold">PERFORMANCE</h1>

        <x-forms.input label="0-60 Time (seconds)" name="zeroSixty" placeholder="4.2" value="{{ $build->zeroSixty }}" />
        <x-forms.input label="0-100 Time (seconds)" name="zeroOneHundred" placeholder="7.9" value="{{ $build->zeroOneHundred }}" />
        <x-forms.input label="1/4 Mile Time (seconds)" name="quarterMile" placeholder="11.2" value="{{ $build->quarterMile }}" />

        <x-forms.divider />

        <h1 class="text-lg font-bold">ENGINE/DRIVETRAIN</h1>

        <x-forms.input label="Engine Type" name="engineType" placeholder="Inline-4, V6, V8, etc." value="{{ $build->engineType }}" />
        <x-forms.input label="Engine Code" name="engineCode" placeholder="RB20DET" value="{{ $build->engineCode }}" />
        <x-forms.input label="Forced Induction Type" name="forcedInduction" placeholder="Turbo" value="{{ $build->forcedInduction }}" />
        <x-forms.input label="Transmission Type" name="trans" placeholder="5-speed" value="{{ $build->trans }}" />

        <x-forms.divider />

        <h1 class="text-lg font-bold">SUSPENSION/BRAKES</h1>

        <x-forms.input label="Suspension Type" name="suspension" placeholder="Independent, solid axle, air suspension" value="{{ $build->suspension }}" />
        <x-forms.input label="Brake Type" name="brakes" placeholder="Disc/Drum" value="{{ $build->brakes }}" />

        <x-forms.divider />

        <h1 class="text-lg font-bold">Current Featured Image:</h1>

        <img class="width-['150px'] max-w-40 rounded-lg" src="{{ Storage::url($build->image) }}" alt="Current Featured Image">

        <x-forms.input label="Update Featured Image" name="image" type="file" />
        <p class="italic text-sm">Max size 10MB</p>

        <x-forms.input label="Additional Images (max 6)" name="additional_images[]" type="file" multiple />
        <p class="italic text-sm">Max size 10MB</p>

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="JDM, Boosted, 1000hpclub" value="{{ $build->tags->pluck('name')->implode(', ') }}" />

        <!-- Delete, Cancel, Edit buttons -->
        <div class="flex justify-end items-center max-w-2xl mx-auto gap-x-6 mt-6">
            <button type="button" id="delete-button" class="font-bold text-sm text-red-500">Delete</button>
            <a href="{{ route('builds.show', $build) }}" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Cancel</a>
            <x-forms.button type="submit">Update</x-forms.button>
        </div>
    </x-forms.form>

    <form name="delete-form" method="POST" action="/builds/{{ $build->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

    <div>
        @if($build->images->isNotEmpty())
        <div class="max-w-2xl mx-auto">
            <h1 class="text-lg font-bold">Current Additional Images</h1>
            <div class="mt-4 grid grid-cols-6 gap-4">
                @foreach ($build->images as $image)
                <div class="relative">
                    <img class="w-full h-auto rounded" src="{{ Storage::url($image->path) }}" alt="Additional Build Image">
                    <form action="{{ route('builds.deleteImage', $image->id) }}" method="POST" class="absolute top-0 right-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white p-1 rounded">X</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>


    <!-- Delete Build Modal -->
    <div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-black bg-opacity-75 p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>
            <p class="mb-4">Are you sure you want to delete this build? This action cannot be undone.</p>
            <div class="flex justify-end space-x-4">
                <button type="button" id="cancel-delete" class="px-4 py-2 bg-gray-200 text-black rounded-lg">Cancel</button>
                <button type="button" id="confirm-delete" class="px-4 py-2 bg-red-500 text-white rounded-lg">Delete</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Status message timeout
            var statusMessage = document.getElementById('status-message');
            if (statusMessage) {
                setTimeout(function() {
                    statusMessage.style.display = 'none';
                }, 5000); // 5 seconds
            }

            // Delete modal logic
            var deleteButton = document.getElementById('delete-button');
            var deleteModal = document.getElementById('delete-modal');
            var cancelDelete = document.getElementById('cancel-delete');
            var confirmDelete = document.getElementById('confirm-delete');
            var deleteForm = document.getElementById('delete-form');

            deleteButton.addEventListener('click', function() {
                deleteModal.classList.remove('hidden');
            });

            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            confirmDelete.addEventListener('click', function() {
                deleteForm.submit();
            });
        });
    </script>
</x-layout>