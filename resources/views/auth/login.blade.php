<x-layout>
    <x-forms.form method="POST" action="/login">
        @csrf

        <x-page-heading>Log In</x-page-heading>

        <x-forms.input label="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

        <x-forms.input label="Password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

        <div class="flex items-center justify-between mt-4">
            <x-forms.button>Login</x-forms.button>
            <a href="{{ route('password.request') }}" class="text-sm text-white hover:text-gray-400">
                Forgot password?
            </a>
        </div>

    </x-forms.form>
</x-layout>