<x-layout>
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-4xl">{{ $user->name }}'s Garage</h1>

        @auth
            @if (Auth::id() !== $user->id)
                @if (Auth::user()->follows->contains($user->id))
                <form action="{{ route('unfollow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit">Unfollow</button>
                </form>
                @else
                <form action="{{ route('follow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit">Follow</button>
                </form>
                @endif
            @endif
        @endauth
    </div>


    <div class="mt-6">
        @foreach($builds as $build)
        <x-build-card-wide :$build />
        @endforeach
    </div>
</x-layout>