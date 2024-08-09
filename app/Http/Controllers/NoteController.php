<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function store(Request $request, Build $build)
    {
        $request->validate([
            'note' => ['required', 'max:10000']
        ]);

        $build->notes()->create([
            'user_id' => Auth::id(),
            'note' => $request->note
        ]);

        return redirect()->route('builds.show', $build)->with('status', 'Note added successfully!');
    }

    public function edit(Note $note)
    {
        $this->authorize('update', $note);

        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $request->validate([
            'note' => ['required', 'max:10000']
        ]);

        $note->update($request->only('note'));

        return redirect()->route('builds.show', $note->build)->with('status', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        return redirect()->route('builds.show', $note->build)->with('status', 'Note deleted successfully!');
    }
}
