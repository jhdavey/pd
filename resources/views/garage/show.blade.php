<x-layout>
    <x-status-message />
    <x-panel>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="flex space-x-6 items-center">
                    @if ($user->profile_image)
                    <div class="mt-2">
                        <img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image" class="w-20 h-20 rounded-full">
                    </div>
                    @endif
                    <h1 class="font-bold text-4xl">{{ $user->name }}'s Garage</h1>
                </div>

                <p class="col-span-2 mt-6">{{ $user->bio }}</p>
            </div>

            <div class="text-end my-auto">
                <p class="text-sm">{{ $followerCount }} followers</p>
                <!-- Do not show follow button for personal garage views -->
                @auth
                @if (Auth::id() !== $user->id)
                @if (Auth::user()->follows->contains($user->id))
                <form action="{{ route('unfollow', $user->id) }}" method="POST">
                    @csrf
                    <button class="text-xl font-bold" type="submit">Unfollow</button>
                </form>
                @else
                <form action="{{ route('follow', $user->id) }}" method="POST">
                    @csrf
                    <button class="text-xl font-bold" type="submit">Follow</button>
                </form>
                @endif
                @endif
                @endauth

                <div class="mt-6">
                    <ul class="space-y-2">
                        <li>IG: <a href="https://instagram.com/{{ $user->instagram }}" target="_blank" class="text-blue-300">{{ $user->instagram }}</a></li>
                        <li>FB: <a href="https://facebook.com/{{ $user->facebook }}" target="_blank" class="text-blue-300">{{ $user->facebook }}</a></li>
                        <li>TikTok: <a href="https://tiktok.com/@{{ $user->tiktok }}" target="_blank" class="text-blue-300">{{ $user->tiktok }}</a></li>
                        <li>YT: <a href="https://youtube.com/{{ $user->youtube }}" target="_blank" class="text-blue-300">{{ $user->youtube }}</a></li>
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