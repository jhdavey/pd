<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Modification;

class ModificationPolicy
{
    public function edit(User $user, Modification $modification)
    {
        return $user->id === $modification->user_id;
    }
}
