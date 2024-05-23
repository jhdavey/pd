<x-layout>
    <div class="text-center md:text-left md:flex md:justify-between md:items-center">
        <x-page-heading>{{ $name }}'s Garage</x-page-heading>

        <!-- TODO: Can't get button to drop down away from heading for some reason - using br tag temporarily... -->
        <br /> 

        <a href="/builds/create" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">New Build</a>
    </div>

    <div class="mt-6">
        @foreach($builds as $build)
            <x-build-card-wide :$build />
        @endforeach  
    </div>
</x-layout>