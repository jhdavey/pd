<x-layout>
    <x-page-heading>
        Reset Password
    </x-page-heading>

    <x-forms.form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <x-forms.input label="Email" id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $request->email }}" required autofocus />

        <x-forms.input label="Password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

        <x-forms.input label="Confirm Password" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

        <div class="flex items-center justify-end mt-4">
            <x-forms.button>Reset Password</x-forms.button>
        </div>
        
    </x-forms.form>
</x-layout>