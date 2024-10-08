@props(['build'])

@php
use Illuminate\Support\Facades\Storage;
@endphp

<x-panel class="flex flex-col text-center">
    <a href="/builds/{{ $build['id'] }}">
        <img class="w-auto max-h-80 mx-auto rounded-lg" src="{{ Storage::url($build->image) }}" alt="Build Feature Image">

        <div class="py-5">
            <a href="{{ route('garage.show', $build->user->id) }}" class="text-lg font-bold">{{ $build->user->name }}'s</a>
            <a href="{{ route('builds.show', $build) }}">
                <h3 class="group-hover:text-gray-500 font-bold text-lg transition-colors duration-200">
                    {{ $build->year }} {{ $build->make }} {{ $build->model }} {{ $build->trim }}
                </h3>
            </a>
            <p>Build type: {{ $build->build_category }}</p>
        </div>

        <div>
            <div class="flex flex-wrap justify-center gap-2">
                @foreach($build->tags as $tag)
                <x-tag :$tag size="small" />
                @endforeach
            </div>
        </div>
    </a>
</x-panel>