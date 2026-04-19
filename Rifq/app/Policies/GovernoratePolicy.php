<?php

namespace App\Policies;

use App\Models\Governorate;
use App\Models\User;

class GovernoratePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, Governorate $gov): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Governorate $gov): bool
    {
        return $user->hasRole('admin');
    }
}
