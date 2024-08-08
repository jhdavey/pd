<x-layout>

    <x-status-message />

    <x-page-heading>Welcome to the Passion Driven Beta!</x-page-heading>

    <p class="my-6">My name is Harley and I am building this project for fun. I am constantly adding and improving features, but there is still a lot of work to do and some bugs to fix. Here are some exciting features I are currently working on:</p>

    <ul class="my-6 space-y-3">
        <li>-Improved build notes editor with image and file uploads</li>
        <li>-Build sheet exporting to pdf and excel files</li>
        <li>-Maintenance tracking</li>
        <li>-Communty forums</li>
        <li>-iOS, Android apps</li>
    </ul>

    <p class="my-6">I'd love to hear from you! Please share any feedback you have, and let me know what features you would like to see. If you are a developer interested in helping wth this project I would love to speak to you! Just message here.</p>

    <p class="my-6">Thank you for your support and for helping create this community!</p>

    <x-forms.divider />

    <x-forms.form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <x-forms.input label="Feedback" name="feedback" type="textarea" rows="4" placeholder="Share your feedback..." required />
        <x-forms.button type="submit">Share Feedback</x-forms.button>
    </x-forms.form>
</x-layout>
