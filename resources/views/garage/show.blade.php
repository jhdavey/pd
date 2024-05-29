@php
$socialMedia = [
'instagram' => ['label' => 'IG', 'url' => 'https://instagram.com/', 'property' => $user->instagram],
'facebook' => ['label' => 'FB', 'url' => 'https://facebook.com/', 'property' => $user->facebook],
'tiktok' => ['label' => 'TikTok', 'url' => 'https://tiktok.com/@', 'property' => $user->tiktok],
'youtube' => ['label' => 'YT', 'url' => 'https://youtube.com/', 'property' => $user->youtube],
];
@endphp

<x-layout>
    <x-status-message />

    @auth
    <div class="w-full text-end mb-1">
        <a href="/profile/{{ $authUser->id }}" class="hover:text-gray-500">Edit Profile</a>
    </div>
    @endauth

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
                        @foreach ($socialMedia as $media)
                        @if (!empty($media['property']))
                        <li>{{ $media['label'] }}: <a href="{{ $media['url'] . $media['property'] }}" target="_blank" class="text-blue-300">{{ $media['property'] }}</a></li>
                        @endif
                        @endforeach
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