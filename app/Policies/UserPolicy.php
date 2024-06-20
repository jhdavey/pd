<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $profileUser
     * @return mixed
     */
    public function update(User $user, User $profileUser)
    {
        // Only allow the user to update their own profile
        return $user->id === $profileUser->id;
    }
}
