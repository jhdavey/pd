<x-layout>
    <div class="space-y-5">

        <section>
            <x-section-heading>Featured Builds</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-4 mt-6">
                @foreach($featuredBuilds->slice(0, 3) as $build)
                <x-build-card :$build />
                @endforeach
            </div>
        </section>

        @auth
        <x-forms.divider />

        <x-section-heading>Following</x-section-heading>
        @if($followingBuilds->isEmpty())
            <p>You are not following any users with builds yet.</p>
        @else
            <ul>
            <div class="grid lg:grid-cols-3 gap-4 mt-6">
                @foreach($followingBuilds as $build)
                <x-build-card :$build />
                @endforeach
            </div>
            </ul>
        @endif
    @endauth

        <x-forms.divider />

        <x-section-heading>Browse Builds</x-section-heading>

        <section>
            <p>Browse by category:</p>
            <div class="flex flex-wrap gap-2 mt-2">
                @foreach($categories as $category)
                <a href="{{ route('search', ['build_category' => $category->build_category]) }}" class="px-4 py-2 text-sm bg-white/10 hover:bg-white/25 rounded-xl font-bold transition-colors duration-200">
                    {{ $category->build_category }}
                </a>
                @endforeach
            </div>
        </section>
        
        <section>
            <p>Browse by tag:</p>
            <div class="flex flex-wrap gap-2 mt-2">
                @foreach($tags->slice(0, 25) as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
        </section>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('filtered') }}" class="md:flex justify-between items-end">
            <x-forms.input type="text" name="year" label="Year" id="year" value="{{ request('year') }}" />

            <x-forms.input type="text" name="make" label="Make" id="make" value="{{ request('make') }}" />

            <x-forms.input type="text" name="model" label="Model" id="model" value="{{ request('model') }}" />

            <button type="submit" class="font-bold px-8 py-2 mb-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">
                Filter
            </button>
        </form>

        <!-- Recently added builds -->

        <section>
            @if($builds->isEmpty())
            <div class="text-center text-gray-500">
                No builds found...
            </div>
            @else

            <x-section-heading>Recently Updated</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-4 mt-6">
                @foreach($builds as $build)
                <x-build-card :$build />
                @endforeach
            </div>
            @endif
        </section>
    </div>
</x-layout>