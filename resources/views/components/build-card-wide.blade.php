@props(['build'])

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<div class="mt-5">
    <a href="/builds/{{ $build['id'] }}">
        <x-panel>
            <div class="md:flex md:space-x-6">
                <img class="w-auto max-h-48 md:max-w-40 rounded-lg" src="{{ Storage::url($build->image) }}" alt="Build Feature Image">                

                <div class="w-full">
                    <div class="md:flex md:justify-between">
                        <p class="text-center md:text-left font-bold text-2xl group-hover:text-gray-500 transition-colors duration-200">
                            {{ $build->year }} {{ $build->make }} {{ $build->model }} {{ $build->trim }}</p>
                        <p class="text-center">Build type: {{$build->build_category}}</p>
                    </div>
                    <div class="text-center md:text-left md:flex md:space-x-5 mt-4">
                        <ul class="list-none">
                            @isset($build['hp'])
                                <li><span class="font-bold text-lg">Horsepower:</span> {{ $build['hp'] }}</li>
                            @endisset
                            @isset($build['whp'])
                                <li><span class="font-bold text-lg">Wheel HP:</span> {{ $build['whp'] }}</li>
                            @endisset
                            
                        </ul>
                        <ul class="list-none">
                            @isset($build['torque'])
                                <li><span class="font-bold text-lg">Torque:</span> {{ $build['torque'] }} lb-ft</li>
                            @endisset
                            @isset($build['weight'])
                                <li><span class="font-bold text-lg">Curb weight:</span> {{ $build['weight'] }} lbs</li>
                            @endisset
                        </ul>
                    </div>

                    <div name="col-3" class="mt-3 flex flex-wrap gap-2 justify-center md:justify-end">
                        @foreach($build->tags->slice(0, 4) as $tag)
                            <x-tag :$tag />
                        @endforeach              
                    </div>
                </div>
            </div>
        </x-panel>
    </a>
</div>
