<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Build;

class FollowController extends Controller
{
    public function show($user, Build $build)
    {
        $user = User::findOrFail($user);

        $followers = $user->followers;

        return view('followers.show', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(User $user)
    {
        $loggedInUser = Auth::user();

        if ($loggedInUser->id === $user->id) {
            return redirect()->back()->with('error', 'You cannot follow yourself.');
        }

        if ($loggedInUser->follows()->where('followed_id', $user->id)->exists()) {
            return redirect()->back()->with('info', 'You are already following this user.');
        }

        $loggedInUser->follows()->attach($user->id);
        return redirect()->back()->with('success', 'You are now following ' . $user->name);
    }

    public function unfollow(User $user)
    {
        Auth::user()->follows()->detach($user->id);
        return redirect()->back()->with('success', 'You have unfollowed ' . $user->name);
    }
}
