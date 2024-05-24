<x-layout>
    <x-page-heading>My Profile</x-page-heading>

    <x-forms.form method="POST" action="{{ route('profile.update', $user) }}">
        @csrf

        <x-forms.input label="Username" name="name" value="{{ $user->name }}" />

        <x-forms.input label="Email" name="email" value="{{ $user->email }}" />

        <x-forms.divider />

        <x-forms.input label="New Password (At least 8 characters)" name="password" placeholder="New password" type="password" />

        <x-forms.input label="Confirm Password" name="password_confirmation" placeholder="Confirm new password" type="password" />

        <p class="italic">Only enter a new password if you would like to update your existing password.</p>

        <x-forms.divider />

        <x-forms.button>Update Profile</x-forms.button>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

    </x-forms.form>
</x-layout>