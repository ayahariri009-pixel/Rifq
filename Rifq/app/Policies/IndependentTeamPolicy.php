<?php

namespace App\Policies;

use App\Models\IndependentTeam;
use App\Models\User;

class IndependentTeamPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, IndependentTeam $team): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, IndependentTeam $team): bool
    {
        return $user->hasRole('admin');
    }
}
