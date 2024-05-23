<x-layout>
    <x-forms.form method="POST" action="/login">
        @csrf

        <x-forms.input label="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

        <x-forms.input label="Password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

        <x-forms.button>Login</x-forms.button>
    </x-forms.form>
</x-layout>