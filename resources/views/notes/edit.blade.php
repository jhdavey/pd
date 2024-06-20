<x-layout>
    <x-panel>
        <form action="{{ route('notes.update', $note) }}" method="POST">
            @csrf
            @method('PATCH')

            <x-forms.text-area label="Edit note" name="body" placeholder="notes..." value="{!! old('notes', $note->body) !!}" />

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