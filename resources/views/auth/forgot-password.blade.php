<x-layout>
    <x-page-heading>
        Forgot Password
    </x-page-heading>

    <x-forms.form method="POST" action="/forgot-password">
        @csrf

        <div class="mb-3">
            <x-forms.input label="Email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-forms.button>
                Email Password Reset Link
            </x-forms.button>
        </div>
    </x-forms.form>
</x-layout>
