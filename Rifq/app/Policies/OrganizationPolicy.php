<?php

namespace App\Policies;

use App\Models\Organization;
use App\Models\User;

class OrganizationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Organization $org): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, Organization $org): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Organization $org): bool
    {
        return $user->hasRole('admin');
    }
}
