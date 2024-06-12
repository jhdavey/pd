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
    <x-page-heading>New Build</x-page-heading>

    <x-forms.form method="POST" action="/builds" enctype="multipart/form-data">
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

        <x-forms.input label="Year*" name="year" placeholder="1995" />
        <x-forms.input label="Make*" name="make" placeholder="Toyota" />
        <x-forms.input label="Model*" name="model" placeholder="Supra" />
        <x-forms.input label="Trim Level" name="trim" placeholder="GTS" />
        <x-forms.select label="Category*" name="build_category" :options="$build_categories" />


        <x-forms.divider />

        <h1 class="font-bold text-lg">SPECS</h1>

        <x-forms.input label="HP" name="hp" placeholder="numbers only" />
        <x-forms.input label="Wheel HP" name="whp" placeholder="numbers only" />
        <x-forms.input label="Torque (lb-ft)" name="torque" placeholder="numbers only" />
        <x-forms.input label="Curb Weight (lbs)" name="weight" placeholder="numbers only, no commas" />
        <x-forms.input label="Vehicle Layout" name="vehicleLayout" placeholder="Front Engine RWD" /> <!-- Change to select input -->
        <x-forms.input label="Fuel Type" name="fuel" placeholder="numbers only" />

        <x-forms.divider />

        <h1 class="font-bold text-lg">PERFORMANCE</h1>

        <x-forms.input label="0-60 Time (seconds)" name="zeroSixty" placeholder="4.2" />
        <x-forms.input label="0-100 Time (seconds)" name="zeroOneHundred" placeholder="7.9" />
        <x-forms.input label="1/4 Mile Time (seconds)" name="quarterMile" placeholder="11.2" />

        <x-forms.divider />

        <h1 class="font-bold text-lg">ENGINE/DRIVETRAIN</h1>

        <x-forms.input label="Engine Type" name="engineType" placeholder="Inline-4, V6, V8, etc." /> <!-- Change to select.blade component input -->
        <x-forms.input label="Engine Code" name="engineCode" placeholder="RB20DET" />
        <x-forms.input label="Forced Induction Type" name="forcedInduction" placeholder="Turbo" /> <!-- Change to select input -->
        <x-forms.input label="Transmission Type" name="trans" placeholder="5-speed" /> <!-- Change to select input -->

        <x-forms.divider />

        <h1 class="font-bold text-lg">SUSPENSION/BRAKES</h1>

        <x-forms.input label="Suspension Type" name="suspension" placeholder="Independent, solid axle, air suspension" />
        <x-forms.input label="Brake Type" name="brakes" placeholder="Disc/Drum" />

        <x-forms.divider />

        <x-forms.input label="Featured Image*" name="image" type="file" />
        <p class="italic text-sm">
            Max size 10MB
            <br />
            Add additional images in the edit build view
        </p>

        <x-forms.input label="Tags (comma seperated)" name="tags" placeholder="JDM, Boosted, 1000hpclub" />

        <p class="italic">Add modifications in the edit view.</p>

        <!-- <x-forms.checkbox label="Submit to be featured" name="featured" /> -->

        <x-forms.button>Create Build</x-forms.button>

    </x-forms.form>
</x-layout>

<!-- -Social media handles - user signup?
    -PERFORMANCE: track times - input track, and time dynamically
    -SUSPENSION/BRAKES: Suspension type, brake type Front/Rear
    -DIMENSIONS: Wheelbase, L/W/H, Ground Clearance
-->