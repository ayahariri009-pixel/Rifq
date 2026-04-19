<?php

namespace App\Policies;

use App\Models\MedicalRecord;
use App\Models\User;

class MedicalRecordPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'vet']);
    }

    public function view(User $user, MedicalRecord $record): bool
    {
        return $user->hasAnyRole(['admin', 'vet']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'vet']);
    }

    public function update(User $user, MedicalRecord $record): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }
        return $user->hasRole('vet') && $record->vet_id === $user->id;
    }

    public function delete(User $user, MedicalRecord $record): bool
    {
        return $user->hasRole('admin');
    }
}
