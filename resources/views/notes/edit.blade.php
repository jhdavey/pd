<x-layout>
    <x-panel>
        <form action="{{ route('notes.update', $note) }}" method="POST">
            @csrf
            @method('PATCH')

            <textarea id="note" name="note" label="Add Note" placeholder="Made some progress today!..." class="w-full break-words rounded-md bg-white/5 p-2 placeholder:text-white/10 overflow-hidden" value="{!! old('notes', $note->note) !!}"></textarea>


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