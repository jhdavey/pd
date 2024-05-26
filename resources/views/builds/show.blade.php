<x-layout>

    <div class="md:flex md:justify-between items-center mt-2">
        <h1 class="text-2xl font-bold">
            {{ $build->user->name }}'s {{ $build['year'] }} {{ $build['make'] }} {{ $build['model'] }} {{ $build['trim'] }}
        </h1>

        @can('edit', $build)
        <div class="flex flex-wrap space-x-2">
            <a href="/mods/{{ $build->id }}/create" class="mt-2 font-bold px-4 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add modifications</a>

            <a href="/builds/{{ $build->id }}/edit" class="mt-2 font-bold px-4 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Edit Build</a>
        </div>
        @endcan
    </div>

    <img class="mx-auto w-full rounded-lg mt-5" src="/{{ $build['image'] }}" alt="Build Feature Image">

    @if($build->images->isNotEmpty())
        <!-- Existing images -->
            <div class="flex space-x-3 mt-2">
                @foreach ($build->images as $image)
                    <a href="{{ Storage::url($image->path) }}" data-lightbox="build-images" data-title="Additional Build Image">
                        <img class="max-w-40 rounded-lg" src="{{ Storage::url($image->path) }}" alt="Additional Build Image">
                    </a>
                @endforeach
            </div>
    @endif

    <div class="my-3 flex justify-between">
        <div class="flex flex-wrap gap-2">
            @foreach($build->tags as $tag)
            <x-tag :$tag />
            @endforeach
        </div>
        <p class="font-bold text-xl">{{ $build->build_category }} Build</p>

    </div>

    <div class="space-y-2">
        <x-panel>
            <div class="md:grid md:grid-cols-2 md:gap-2">
                <div>
                    <h2 class="font-bold text-xl">Vehicle Stats</h2>

                    <ul class="list-none space-y-2">
                        <li><span class="font-bold">Horsepower:</span> {{ $build['hp'] }}</li>
                        <li><span class="font-bold">Wheel HP:</span> {{ $build['whp'] }}</li>
                        <li><span class="font-bold">Torque:</span> {{ $build['torque'] }}</li>
                        <li><span class="font-bold">Curb Weight:</span> {{ $build['weight'] }}</li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-bold text-xl mt-3 md:mt-0">Vehicle Performance</h2>

                    <ul class="list-none space-y-2">
                        <li><span class="font-bold">0-60 Time:</span> {{ $build['zeroSixty'] }}</li>
                        <li><span class="font-bold">0-100 Time:,</span> {{ $build['zeroOneHundred'] }}</li>
                        <li><span class="font-bold">1/4 Mile Time:</span> {{ $build['quarterMile'] }}</li>
                    </ul>
                </div>
            </div>
        </x-panel>

        <x-panel>
            <div class="md:grid md:grid-cols-2 md:gap-2">
                <div>
                    <h2 class="font-bold text-xl">Vehicle Specs</h2>

                    <ul class="list-none space-y-2">
                        <li><span class="font-bold">Platform Layout:</span> {{ $build['vehicleLayout'] }}</li>
                        <li><span class="font-bold">Engine Type:</span> {{ $build['engineType'] }}</li>
                        <li><span class="font-bold">Engine Code:</span> {{ $build['engineCode'] }}</li>
                        <li><span class="font-bold">Fuel Type:</span> {{ $build['fuel'] }}</li>
                    </ul>
                </div>

                <div>
                    <ul class="list-none space-y-2">
                        <li><span class="font-bold">Transmission Type:</span> {{ $build['trans'] }}</li>
                        <li><span class="font-bold">Suspension Type:</span> {{ $build['suspension'] }}</li>
                        <li><span class="font-bold">Brake Setup:</span> {{ $build['brakes'] }}</li>
                    </ul>
                </div>
            </div>
        </x-panel>
    </div>

    <x-forms.divider />

    <section class="space-y-2">
        @if($build->modifications->isEmpty())

        <div class="md:flex md:space-x-5 items-center">
            <p class="font-bold italic text-lg">No modifications have been added yet.</p>

            <!-- TODO: Can't get button to drop down away from heading for some reason - using br tag temporarily... -->
            <br />

            @can('edit', $build)
            <a href="/mods/{{ $build->id }}/create" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add modifications</a>
            @endcan

            @else

            <h2 class="text-3xl font-bold mb-5">Modifications</h2>

            @foreach($modificationsByCategory as $category => $modifications)

            <x-section-heading>{{ $category }}</x-section-heading>

            <div class="w-full space-y-3">
                @foreach($modifications as $modification)
                <a href="/mods/{{ $modification->id }}/edit">
                    <x-panel>
                        <div class="grid grid-cols-6">
                            <p class="font-bold text-lg col-span-3">{{ $modification->brand }} {{ $modification->name }}</p>
                            @isset($modification->price)
                            <p>${{ $modification->price }}</p>
                            @endisset
                            @isset($modification->part)
                            <p class="col-span-2">Part No: {{ $modification->part }}</p>
                            @endisset
                        </div>
                        @isset($modification->notes)
                        <p class="mt-3"><span class="font-bold">Notes:</span> {{ $modification->notes }}</p>
                        @endisset
                    </x-panel>
                </a>
                @endforeach
            </div>
            @endforeach
            @endif


    </section>

</x-layout>