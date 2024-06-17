<?php

namespace App\Policies;

use App\Models\Home;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HomePolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Home $home): bool
    {
        return $user->id === $home->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Home $home): bool
    {
        return $user->id === $home->user_id;
    }
}
