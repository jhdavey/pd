<x-layout>
    <x-panel>
        <form action="{{ route('notes.update', $note) }}" method="POST">
            @csrf
            @method('PATCH')

            <textarea id="note" name="note" label="Add Note" placeholder="Made some progress today!..." class="w-full rounded-md bg-white/5 p-2 placeholder:text-white/10 overflow-hidden">{!! $note->note !!}</textarea>


            @error('body')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror

            <x-forms.button type="submit">Update Note</x-forms.button>
        </form>
    </x-panel>
</x-layout>