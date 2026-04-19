<?php

namespace App\Policies;

use App\Models\AdoptionRequest;
use App\Models\User;

class AdoptionRequestPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'data_entry']);
    }

    public function view(User $user, AdoptionRequest $request): bool
    {
        return $user->hasAnyRole(['admin', 'data_entry']);
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, AdoptionRequest $request): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, AdoptionRequest $request): bool
    {
        return $user->hasRole('admin');
    }
}
