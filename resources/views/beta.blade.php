<x-layout>

    <x-status-message />

    <x-page-heading>Get early access and help us improve the platform</x-page-heading>

    <p class="my-6">
        This project began in May 2024. The goal is to create a platform that allows car enthusiasts of all types to come together and enjoy a shared passion. The platform will allow you to:
        <br />
        <ul>
            <li>- List your builds in your garage</li>
            <li>- Track your builds including modifications, specs, and performance</li>
            <li>- Follow your favorite builds</li>
            <li>- Explore new builds across any genre</li>
            <li>- Share thoughts and words of encouragement to other builders</li>
            <li>- And enjoy a community of gear heads like you!</li>
        </ul>
        <br />
        We are offering early access to a limited number of enthusiasts that are willing to help us identify bugs and give feedback on what types of features we should implement to improve the platform for all.
        <br />
        <br />
        If you're interested in gaining early access, sign up below.
    </p>

    <x-forms.divider />

    <x-forms.form action="{{ route('beta.store') }}" method="POST">
        @csrf
        <x-forms.input label="Name" name="name" placeholder="Name" required />
        <x-forms.input label="Email" name="email" placeholder="Email" required />
        <x-forms.button type="submit">Signup</x-forms.button>
    </x-forms.form>
</x-layout>
