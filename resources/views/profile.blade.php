<x-layout>
    <x-status-message />

    <x-page-heading>Edit Profile</x-page-heading>
    <x-panel>
        <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-3">
            @csrf
            @method('PATCH')

            <div class="flex space-x-4">
                @if ($user->profile_image)
                <div class="mt-4">
                    <img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image" class="w-20 h-20 rounded-full">
                </div>
                @endif

                <x-forms.input label="Profile Image" name="profile_image" type="file" />
            </div>
            
            <x-forms.input label="Username" name="name" value="{{ $user->name }}" required />
            <x-forms.input label="Email" name="email" type="email" value="{{ $user->email }}" required />
            <x-forms.text-area label="Bio" name="bio" value="{!! $user->bio !!}" />
            <x-forms.input label="Instagram" name="instagram" value="{{ $user->instagram }}" />
            <x-forms.input label="Facebook" name="facebook" value="{{ $user->facebook }}" />
            <x-forms.input label="TikTok" name="tiktok" value="{{ $user->tiktok }}" />
            <x-forms.input label="YouTube" name="youtube" value="{{ $user->youtube }}" />
            <x-forms.input label="Password" name="password" type="password" />
            <x-forms.input label="Confirm Password" name="password_confirmation" type="password" />

            <div class="flex justify-end items-center mx-auto gap-x-6 mt-6">
                <a href="{{ route('garage.show', $user->id) }}" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Cancel</a>
                
                <x-forms.button type="submit">Update Profile</x-forms.button>
            </div>
        </form>
    </x-panel>
</x-layout>