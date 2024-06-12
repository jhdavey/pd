<x-layout>
    <x-page-heading>Edit Note</x-page-heading>
    <x-panel>
        <form action="{{ route('notes.update', $note) }}" method="POST">
            @csrf
            @method('PATCH')

            <textarea label="Note" name="body" class="w-full break-words border rounded-md bg-white/10 border-white/10 px-4 py-2 placeholder:text-white/10 resize-none overflow-hidden">{{ $note->body }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror

            <x-forms.button type="submit">Update Note</x-forms.button>
        </form>
    </x-panel>
</x-layout>

<!-- Comment text area auto resize -->
<style>
    textarea {
        overflow-y: hidden;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.querySelector('textarea[name="body"]');
        
        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Initial height setting for pre-filled textarea
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
    });
</script>