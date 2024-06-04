<x-layout>

    <x-status-message />

    <div class="md:flex md:justify-between items-center mt-2">
        <h1 class="text-2xl font-bold">
            {{ $build->user->name }}'s {{ $build['year'] }} {{ $build['make'] }} {{ $build['model'] }} {{ $build['trim'] }}
        </h1>

        @can('edit', $build)
        <div class="flex flex-wrap space-x-2">
            <a href="/mods/{{ $build->id }}/create" class="mt-2 font-bold px-4 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add mod</a>

            <a href="/builds/{{ $build->id }}/edit" class="mt-2 font-bold px-4 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Edit Build</a>
        </div>
        @endcan
    </div>

    <img class="mx-auto w-full rounded-lg mt-5" src="{{ Storage::url($build->image) }}" alt="Build Feature Image">

    @if($build->images->isNotEmpty())
    <div class="p-2 w-full grid grid-cols-2 place-items-center md:grid md:grid-cols-5 gap-3">
        @foreach ($build->images as $image)
        <a href="{{ Storage::url($image->path) }}" data-lightbox="build-images" data-title="Additional Build Image">
            <img class="w-full md:max-w-44 rounded-lg" src="{{ Storage::url($image->path) }}" alt="Additional Build Image">
        </a>
        @endforeach
    </div>
    @endif

    <div class="my-3 flex flex-wrap gap-2">
        @foreach($build->tags as $tag) 
        <x-tag :tag="$tag" />
        @endforeach
    </div>

    <div class="px-2 my-2 flex justify-between">
        <h2 class="font-bold text-xl">Vehicle Specs</h2>

        <p class="text-lg">{{ $build->build_category }} Build</p>
    </div>

    <div class="space-y-2">
        <x-panel>
            <div class="md:grid md:grid-cols-2 md:gap-2">
                <div>
                    <ul class="list-none space-y-2">
                        @if ($build->hp)<li><span class="font-bold">Horsepower:</span> {{ $build->hp }}</li>@endif
                        @if ($build->whp)<li><span class="font-bold">Wheel HP:</span> {{ $build->whp }}</li>@endif
                        @if ($build->torque)<li><span class="font-bold">Torque:</span> {{ $build->torque }}</li>@endif
                        @if ($build->weight)<li><span class="font-bold">Curb Weight:</span> {{ $build->weight }}</li>@endif
                    </ul>
                </div>

                <ul class="list-none space-y-2">
                @if ($build->zeroSixty)<li><span class="font-bold">0-60 Time:</span> {{ $build->zeroSixty }}</li>@endif
                @if ($build->zeroOneHundred)<li><span class="font-bold">0-100 Time:</span> {{ $build->zeroOneHundred }}</li>@endif
                @if ($build->quarterMile)<li><span class="font-bold">1/4 Mile Time:</span> {{ $build->quarterMile }}</li>@endif
                </ul>
            </div>
        </x-panel>

        <x-panel>
            <div class="md:grid md:grid-cols-2 md:gap-2">
                <div>
                    <ul class="list-none space-y-2">
                    @if ($build->vehicleLayout)<li><span class="font-bold">Platform Layout:</span> {{ $build->vehicleLayout }}</li>@endif
                    @if ($build->engineType)<li><span class="font-bold">Engine Type:</span> {{ $build->engineType }}</li>@endif
                    @if ($build->engineCode)<li><span class="font-bold">Engine Code:</span> {{ $build->engineCode }}</li>@endif
                    @if ($build->fuel)<li><span class="font-bold">Fuel Type:</span> {{ $build->fuel }}</li>@endif
                    </ul>
                </div>

                <div>
                    <ul class="list-none space-y-2">
                    @if ($build->trans)<li><span class="font-bold">Transmission Type:</span> {{ $build->trans }}</li>@endif
                    @if ($build->suspension)<li><span class="font-bold">Suspension Type:</span> {{ $build->suspension }}</li>@endif
                    @if ($build->brakes)<li><span class="font-bold">Brake Setup:</span> {{ $build->brakes }}</li>@endif
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

            <br />

            @can('edit', $build)
            <a href="/mods/{{ $build->id }}/create" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add mod</a>
            @endcan

        @else
        <div class="w-full flex justify-between items-center">
            <x-section-heading>Modifications</x-section-heading>
            
            <a href="/mods/{{ $build->id }}/create" class="mt-2 font-bold px-4 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add mod</a>
        </div>

        @foreach($modificationsByCategory as $category => $modifications)
        <h3 class="text-lg font-bold">{{ $category }}</h3>

        <div class="w-full space-y-3">
            @foreach($modifications as $modification)
            <a href="{{ route('mods.edit', ['build' => $modification->build_id, 'modification' => $modification->id]) }}">
                <x-panel>
                    <div class="grid grid-cols-6">
                        <p class="col-span-3 text-lg font-bold">{{ $modification->brand }} {{ $modification->name }}</p>

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

                    @if ($modification->images->isNotEmpty())
                    <div class="flex space-x-3 mt-4">
                        @foreach ($modification->images as $image)
                        <a href="{{ Storage::url($image->image_path) }}" data-lightbox="mod-images-{{ $modification->id }}" data-title="Modification Image">
                            <img src="{{ Storage::url($image->image_path) }}" alt="Modification Image" class="h-20 rounded">
                        </a>
                        @endforeach
                    </div>
                    @endif
                </x-panel>
            </a>
            @endforeach
        </div>
        @endforeach
        @endif
    </section>

    <x-forms.divider />

    <!-- Comments Section -->
    <div class="mt-6">
        <x-section-heading>Comments</x-section-heading>

        @if ($build->comments->isNotEmpty())
        @foreach ($build->comments as $comment)
        <div class="mt-4">
            <x-panel class="break-words">
                <p>{{ $comment->body }}</p>

                <p>
                    {{ $comment->updated_at ? 'Edited' : 'Posted' }} by {{ $comment->user->name }}
                    {{ $comment->updated_at ? $comment->updated_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A') : $comment->created_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A') }}
                    <span class="text-2xs italic">EST</span>
                </p>

                @can('update', $comment)
                <a href="{{ route('comments.edit', $comment) }}" class="text-blue-500">Edit</a>
                @endcan

                @can('delete', $comment)
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
                @endcan
            </x-panel>
        </div>
        @endforeach
        @else
        <p>No comments on this post yet...</p>
        @endif

        @auth
        <form action="{{ route('comments.store', $build) }}" method="POST" class="mt-6">
            @csrf
            <textarea name="body" rows="1" class="w-full break-words border rounded-md bg-white/10 border-white/10 px-4 py-2 w-full placeholder:text-white/10" placeholder="Love the wheel choice!" required></textarea>
            <button type="submit" class="mt-4 font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Post Comment</button>
        </form>
        @endauth
    </div>
</x-layout>
