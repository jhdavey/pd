<x-layout>
    <div class="space-y-5">

        <section>
            <x-section-heading>Featured Builds</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredBuilds->slice(0, 3) as $build)
                <x-build-card :$build />
                @endforeach
            </div>
        </section>

        <x-forms.divider />

        <x-section-heading>Browse Builds</x-section-heading>

        <section>
            <div class="flex flex-wrap gap-2">
                @foreach($tags->slice(0, 15) as $tag)
                <x-tag :$tag />
                @endforeach
            </div>
        </section>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('filtered') }}" class="md:flex justify-between items-end space-y-2">
            <x-forms.input type="text" name="year" label="Year" id="year" value="{{ request('year') }}" />

            <x-forms.input type="text" name="make" label="Make" id="make" value="{{ request('make') }}" />

            <x-forms.input type="text" name="model" label="Model" id="model" value="{{ request('model') }}" />

            <button type="submit" class="font-bold px-8 py-2 mb-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">
                Filter
            </button>
        </form>

        <x-section-heading>Recently Added</x-section-heading>

        <section>
            @if($builds->isEmpty())
            <div class="text-center text-gray-500">
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
    </div>
</x-layout>