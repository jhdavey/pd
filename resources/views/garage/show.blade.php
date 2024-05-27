<x-layout>
    <x-panel>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h1 class="font-bold text-4xl">{{ $user->name }}'s Garage</h1>

                <p class="col-span-2 mt-6">{{ $user->bio }}</p>
            </div>

            <div class="text-end my-auto">
                @auth
                    @if (Auth::id() !== $user->id)
                        @if (Auth::user()->follows->contains($user->id))
                            <form action="{{ route('unfollow', $user->id) }}" method="POST">
                                @csrf
                                <span class="text-sm">{{ $followerCount }} followers</span>
                                <button class="text-xl font-bold" type="submit">Unfollow</button>
                            </form>
                        @else
                            <form action="{{ route('follow', $user->id) }}" method="POST">
                                @csrf
                                <span class="text-sm">{{ $followerCount }} followers</span>
                                <button class="text-xl font-bold" type="submit">Follow</button>
                            </form>
                        @endif
                    @endif
                @endauth

                <div class="mt-6">
                    <ul class="space-y-2">
                        <li><span class="font-bold">Instagram: @</span> {{ $user->instagram }}</li>
                        <li><span class="font-bold">Facebook: @</span> {{ $user->facebook }}</li>
                        <li><span class="font-bold">TokTok: @</span> {{ $user->tiktok }}</li>
                        <li><span class="font-bold">Youtube:</span> {{ $user->youtube }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </x-panel>

    <x-forms.divider />

    @auth
        @if (Auth::id() === $user->id)
            <div class="w-full grid place-items-end">
                <a href="/builds/create" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">New Build</a>
            </div>
        @endif
    @endauth

    <div class="mt-6">
        @foreach($builds as $build)
            <x-build-card-wide :build="$build" />
        @endforeach
    </div>
</x-layout>
