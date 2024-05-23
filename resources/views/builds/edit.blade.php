<x-layout>
    <x-page-heading>Edit Build: {{ $build->make }} {{ $build->model }}</x-page-heading>

    <x-forms.form method="POST" action="/builds/{{ $build->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-forms.input label="Year*" name="year" placeholder="1995" value="{{ $build->year }}" />
        <x-forms.input label="Make*" name="make" placeholder="Toyota" value="{{ $build->make }}" />
        <x-forms.input label="Model*" name="model" placeholder="Supra" value="{{ $build->model }}" />
        <x-forms.input label="Trim Level" name="trim" placeholder="GTS" value="{{ $build->trim }}" />

        <x-forms.divider />

        <h1 class="text-lg font-bold">SPECS</h1>

        <x-forms.input label="HP" name="hp" placeholder="345" value="{{ $build->hp }}" />
        <x-forms.input label="Wheel HP" name="whp" placeholder="320" value="{{ $build->whp }}" />
        <x-forms.input label="Torque (lb-ft)" name="torque" placeholder="335" value="{{ $build->torque }}" />
        <x-forms.input label="Curb Weight (lbs)" name="weight" placeholder="3550" value="{{ $build->weight }}" />
        <x-forms.input label="Vehicle Layout" name="vehicleLayout" placeholder="Front Engine RWD" value="{{ $build->vehicleLayout }}" />
        <x-forms.input label="Fuel Type" name="fuel" placeholder="93" value="{{ $build->fuel }}" />

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

        <x-forms.input label="Featured Image" name="image" type="file" />

        <p>Current Featured Image:</p>
        
        <img class="width-['150px'] max-w-40 rounded-lg" src="{{ Storage::url($build->image) }}" alt="Current Featured Image">

        <x-forms.input label="Additional Images (max 6)" name="additional_images[]" type="file" multiple />

        <!-- Existing images -->
        @if($build->images->isNotEmpty())
            <p>Current Additional Images</p>
            
            <div class="flex space-x-3">
                @foreach ($build->images as $image)
                    <img class="max-w-40 rounded-lg" src="{{ Storage::url($image->path) }}" alt="Additional Build Image">
                @endforeach
            </div>
        @endif

        <x-forms.input label="Tags (comma seperated)" name="tags" placeholder="JDM, Boosted, 1000hpclub" />

        <!-- Delete, Cancel, Edit buttons -->
        <div class="flex justify-end items-center max-w-2xl mx-auto gap-x-6 mt-6">
            <button form="delete-form" class="font-bold text-sm text-red-500">Delete</button>
            <a href="{{ route('builds.show', $build) }}" type="button" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Cancel</a>
            <x-forms.button type="submit">Update</x-forms.button>
        </div>
    </x-forms.form>

    <form name="delete-form" method="POST" action="/builds/{{ $build->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
