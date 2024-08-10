<?php

namespace App\Policies;

use App\Models\Build;
use App\Models\User;

class BuildPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function edit(User $user, Build $build): bool
    {
        return $build->user->is($user);
    }

    /**
     * Determine whether the user can update any models. (For downloading build sheet)
     */
    public function update(User $user, Build $build)
    {
        return $user->id === $build->user_id;
    }
}
