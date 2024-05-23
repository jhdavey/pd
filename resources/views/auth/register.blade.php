<x-layout>
    <x-forms.form method="POST" action="/register">
        @csrf

        <x-forms.input label="Username" id="name" class="block mt-1 w-full" type="text" name="name" required />

        <x-forms.input label="Email" id="email" class="block mt-1 w-full" type="email" name="email" required />

        <x-forms.input label="Password" id="password" class="block mt-1 w-full" type="password" name="password" required />

        <x-forms.input label="Confirm Password" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
</x-layout>
