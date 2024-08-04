<x-layout>
    <x-page-heading>{{ $user->name }}'s Followers</x-page-heading>

    <x-panel>
    @if ($followers->isNotEmpty())
        <ul>
            @foreach($followers as $follower)
            <li><a href="{{ route('garage.show', $follower->id) }}">{{ $follower->name }}</a></li>
            @endforeach
        </ul>
        @else
        <p>{{ $user->name }} does not have any followers yet...</p>
        @endif
    </x-panel>
</x-layout>