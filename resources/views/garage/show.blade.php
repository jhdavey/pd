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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-3">
            <!-- Top Row: Profile Image, Title, Followers, and Follow/Unfollow Button -->
            <div class="flex flex-col md:flex-row md:space-x-6 items-center justify-between md:col-span-2">
                <div class="flex items-center space-x-4">
                    @if ($user->profile_image)
                    <div class="mt-2 md:mt-0">
                        <img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image" class="h-20 w-20 rounded-full object-cover">
                    </div>
                    @endif

                    <h1 class="font-bold text-3xl">{{ $user->name }}'s Garage</h1>
                </div>

                <div class="text-center md:text-end mt-4 md:mt-0">
                    <p class="text-sm">{{ $followerCount }} followers</p>
                    @auth
                    @if (Auth::id() !== $user->id)
                    @if (Auth::user()->follows->contains($user->id))
                    <form action="{{ route('unfollow', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button class="text-xl font-bold mt-2 md:mt-0" type="submit">Unfollow</button>
                    </form>
                    @else
                    <form action="{{ route('follow', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button class="text-xl font-bold mt-2 md:mt-0" type="submit">Follow</button>
                    </form>
                    @endif
                    @endif
                    @endauth
                </div>
            </div>

            <!-- Bottom Row: Bio and Social Media Links -->
            <div>
                <p class="ml-2 text-center md:text-start">{{ $user->bio }}</p>
            </div>

            <div class="text-center md:text-end">
                <ul class="space-y-2">
                    @foreach ($socialMedia as $media)
                    @if (!empty($media['property']))
                    <li>{{ $media['label'] }}: <a href="{{ $media['url'] . $media['property'] }}" target="_blank" class="text-blue-300">{{ $media['property'] }}</a></li>
                    @endif
                    @endforeach
                </ul>
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