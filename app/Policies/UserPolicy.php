<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $authenticatedUser
     * @param User $user
     * @return bool
     */
    public function as(User $authenticatedUser, User $user): bool
    {
        return $authenticatedUser->id === $user->id;
    }
}
