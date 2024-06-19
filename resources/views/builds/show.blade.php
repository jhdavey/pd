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
        <a href="#" class="image-link" data-image-url="{{ Storage::url($image->path) }}">
            <img class="w-full md:max-w-44 rounded-lg" src="{{ Storage::url($image->path) }}" alt="Additional Build Image">
        </a>
        @endforeach
    </div>
    @endif

    <!-- Image Modal Structure -->
    <div id="image-modal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
        <div class="relative bg-background p-4 rounded-lg max-w-full max-h-full md:max-w-4xl">
            <button id="close-modal" class="absolute top-0 right-0 text-red-500 bg-white rounded p-3">X</button>
            <img id="modal-image" src="" alt="Full Size Image" class="max-w-full max-h-full">
        </div>
    </div>

    <div class="my-3 flex flex-wrap gap-2">
        @foreach($build->tags as $tag)
        <x-tag :tag="$tag" />
        @endforeach
    </div>

    <div class="px-2 my-2 md:flex md:justify-between items-center">
        <x-section-heading>Vehicle Specs</x-section-heading>

        <p class="text-lg">Build type: {{ $build->build_category }}</p>
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
        </div>
        @else
        <div class="w-full flex justify-between items-center">
            <x-section-heading>Modifications</x-section-heading>
            @can('edit', $build)
            <a href="/mods/{{ $build->id }}/create" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add mod</a>
            @endcan
        </div>

        @foreach($modificationsByCategory as $category => $modifications)
        <div x-data="{ open: false }" class="mb-4">
            <div class="flex justify-between items-center cursor-pointer p-2 my-2 bg-white/10 rounded-lg shadow-md" @click="open = !open">
                <h3 class="text-lg font-bold">{{ $category }}</h3>
                <svg class="w-6 h-6 transition-transform transform" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <div x-show="open" x-transition class="w-full mt-3 space-y-4">
                @foreach($modifications as $modification)
                <x-panel class="mb-4">
                    <div class="space-y-2 md:flex md:justify-between">
                        <p class="text-lg font-bold">{{ $modification->brand }} {{ $modification->name }}</p>

                        @isset($modification->part)
                        <p>Part No: {{ $modification->part }} @isset($modification->price)| ${{ $modification->price }}</p>@endisset
                        @endisset
                    </div>

                    @isset($modification->notes)
                    <p class="mt-3"><span class="font-bold">Notes:</span> {!! $modification->notes !!}</p>
                    @endisset

                    @if ($modification->images->isNotEmpty())
                    <div class="mt-4 w-full grid grid-cols-2 place-items-center md:grid md:grid-cols-5 gap-3">
                        @foreach ($modification->images as $image)
                        <a href="{{ Storage::url($image->image_path) }}" data-lightbox="mod-images-{{ $modification->id }}" data-title="Modification Image" class="w-full">
                            <img src="{{ Storage::url($image->image_path) }}" alt="Modification Image" class="md:max-w-44 rounded">
                        </a>
                        @endforeach
                    </div>
                    @endif

                    <a href="{{ route('mods.edit', ['build' => $modification->build_id, 'modification' => $modification->id]) }}">
                    @can('edit', $build)<p class="text-sm text-end mt-4">edit mod</p>@endcan
                    </a>
                </x-panel>
                @endforeach
            </div>
        </div>
        @endforeach
        @endif
    </section>

    <x-forms.divider />

    <!-- Build Notes Section -->
    <div class="mt-6">
        <x-section-heading>Build Notes</x-section-heading>

        @if ($build->notes->isNotEmpty())
        @foreach ($build->notes as $note)
        <div class="mt-4">
            <x-panel class="break-words">
                <p>{{ $note->body }}</p>
                <p class="text-sm">{{ $note->updated_at ? 'Edited' : 'Posted' }} by {{ $note->user->name }} {{ $note->updated_at ? $note->updated_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A') : $note->created_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A') }}</p>
                @can('update', $note)
                <a href="{{ route('notes.edit', $note) }}" class="text-blue-500">Edit</a>
                @endcan
                @can('delete', $note)
                <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
                @endcan
            </x-panel>
        </div>
        @endforeach
        @else
        <p>No notes on this build yet...</p>
        @endif

        @can('edit', $build)
        <form action="{{ route('notes.store', $build) }}" method="POST" class="mt-6">
            @csrf
            <textarea name="body" rows="2" class="w-full break-words border rounded-md bg-white/10 border-white/10 px-4 py-2 placeholder:text-white/10 resize-none overflow-hidden" placeholder="New note..." required></textarea>
            @error('body')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
            <button type="submit" class="mt-4 font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Post Note</button>
        </form>
        @endcan
    </div>

    <x-forms.divider />

    <!-- Comments Section -->
    <div class="mt-6">
        <x-section-heading>Comments</x-section-heading>

        @if ($build->comments->isNotEmpty())
        @foreach ($build->comments as $comment)
        <div class="mt-4">
            <x-panel class="break-words">
                <p>{{ $comment->body }}</p>
                <p class="text-sm">
                    {{ $comment->updated_at ? 'Edited' : 'Posted' }} by
                    <a href="{{ route('garage.show', $comment->user->id) }}" class="text-blue-500">
                        {{ $comment->user->name }}
                    </a>
                    {{ $comment->updated_at ? $comment->updated_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A') : $comment->created_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A') }}
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
        <p>No comments on this build yet...</p>
        @endif

        @auth
        <form action="{{ route('comments.store', $build) }}" method="POST" class="mt-6">
            @csrf
            <textarea name="body" rows="2" class="w-full break-words border rounded-md bg-white/10 border-white/10 px-4 py-2 placeholder:text-white/10 resize-none overflow-hidden" placeholder="Love the wheel choice!" required>{{ old('body') }}</textarea>
            @error('body')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
            <button type="submit" class="mt-4 font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Post Comment</button>
        </form>
        @endauth
    </div>
</x-layout>

<!-- Comment text area auto resize -->
<style>
    textarea {
        overflow-y: hidden;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.querySelector('textarea[name="body"]');

        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Initial height setting for pre-filled textarea
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
    });
</script>

<!-- Image modal view -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    const closeModalButton = document.getElementById('close-modal');
    const imageLinks = document.querySelectorAll('.image-link');

    imageLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const imageUrl = this.getAttribute('data-image-url');
            modalImage.setAttribute('src', imageUrl);
            modal.classList.remove('hidden');
        });
    });

    closeModalButton.addEventListener('click', function () {
        modal.classList.add('hidden');
    });

    // Close modal on clicking outside the image
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
});

</script>