<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Policies\CommentPolicy;

class CommentController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function store(Request $request, Build $build)
    {
        $request->validate([
            'body' => ['required', 'string', 'max:1000']
        ]);

        $build->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->body
        ]);

        return redirect()->route('builds.show', $build)->with('status', 'Comment added successfully!');
    }

    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'body' => ['required', 'string', 'max:1000']
        ]);

        $comment->update($request->only('body'));

        return redirect()->route('builds.show', $comment->build)->with('status', 'Comment updated successfully!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('builds.show', $comment->build)->with('status', 'Comment deleted successfully!');
    }
}
