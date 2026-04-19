<?php

namespace App\Policies;

use App\Models\AIScan;
use App\Models\User;

class AIScanPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'vet']);
    }

    public function view(User $user, AIScan $scan): bool
    {
        return $user->hasAnyRole(['admin', 'vet']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'vet']);
    }

    public function update(User $user, AIScan $scan): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, AIScan $scan): bool
    {
        return $user->hasRole('admin');
    }
}
