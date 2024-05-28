<x-layout>
    <x-page-heading>Edit Comment</x-page-heading>
    <x-panel>
        <form action="{{ route('comments.update', $comment) }}" method="POST">
            @csrf
            @method('PATCH')
            <x-forms.text-area label="Comment" name="body" value="{{ $comment->body }}" />
            <x-forms.button type="submit">Update Comment</x-forms.button>
        </form>
    </x-panel>
</x-layout>
