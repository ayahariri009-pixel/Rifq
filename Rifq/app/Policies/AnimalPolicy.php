<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;

class AnimalPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'data_entry', 'vet']);
    }

    public function view(User $user, Animal $animal): bool
    {
        return $user->hasAnyRole(['admin', 'data_entry', 'vet']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'data_entry']);
    }

    public function update(User $user, Animal $animal): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }
        if ($user->hasRole('data_entry')) {
            return $animal->independent_team_id === $user->independent_team_id;
        }
        return false;
    }

    public function delete(User $user, Animal $animal): bool
    {
        return $user->hasRole('admin');
    }

    public function restore(User $user, Animal $animal): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Animal $animal): bool
    {
        return $user->hasRole('admin');
    }
}
