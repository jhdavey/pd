<!-- resources/views/builds/index.blade.php -->
<x-layout>
    <x-page-heading>Browse Builds</x-page-heading>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('filtered') }}" class="mt-5 md:flex md:justify-between md:items-end">
            <x-forms.input type="text" name="year" label="Year" id="year" value="{{ request('year') }}" />

            <x-forms.input type="text" name="make" label="Make" id="make" value="{{ request('make') }}" />

            <x-forms.input type="text" name="model" label="Model" id="model" value="{{ request('model') }}" />

            <button type="submit" class="mt-5 font-bold px-8 py-2 mb-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">
                Filter
            </button>
        </form>

    <!-- Display Builds -->
    <section>
        @if($builds->isEmpty())
            <div class="text-center text-gray-500 mt-5">
                No builds found...
            </div>
        @else
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($builds as $build)
                    <x-build-card :$build />
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
