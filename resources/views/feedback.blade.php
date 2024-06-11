<x-layout>

    <x-status-message />

    <x-page-heading>Welcome to the Beta Version of Passion Driven!</x-page-heading>

    <p class="my-6">I am constantly adding and improving features, but there is still a lot of work to do and some bugs to fix. Here are some exciting features we are currently working on:</p>

    <ul class="my-6 space-y-3">
        <li>-Video, and file uploads</li>
        <li>-Build sheet exporting to pdf and excel files</li>
        <li>-Adding track times</li>
        <li>-iOS, Android apps coming soon</li>
        <li>-Plus bug fixes, and much much more</li>
    </ul>

    <p class="my-6">I want to hear from you! This platform is designed to allows car enthusiasts of all types to track and share their builds with fellow enthusiasts. Please share any feedback you have, and let me know what features you would like to see.</p>

    <p class="my-6">Thank you for being part of the community!</p>

    <x-forms.divider />

    <x-forms.form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <x-forms.input label="Feedback" name="feedback" type="textarea" rows="4" placeholder="Share your feedback..." required />
        <x-forms.button type="submit">Share Feedback</x-forms.button>
    </x-forms.form>
</x-layout>
