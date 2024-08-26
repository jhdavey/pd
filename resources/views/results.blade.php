<x-layout>
<x-page-heading>{{ $tag->name }} Builds</x-page-heading>

    <div class="space-y-6">
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
    </div>
</x-layout>