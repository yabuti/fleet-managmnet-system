<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function isAdmin(User $user)
    {
        return $user->hasRole('admin');
    }

    public function isDriver(User $user)
    {
        return $user->hasRole('driver');
    }

    // Add other role methods as needed
}
