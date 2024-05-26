<x-layout>
    <div class="space-y-6">
        @if($builds->isEmpty())
            <div class="text-center text-gray-500">
                No builds found...
            </div>
        @else
            @foreach($builds as $build)
                <x-build-card-wide :$build />
            @endforeach
        @endif
    </div>
</x-layout>