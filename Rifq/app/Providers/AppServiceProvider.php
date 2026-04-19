<?php

namespace App\Providers;

use App\Models\AdoptionRequest;
use App\Models\AIScan;
use App\Models\Animal;
use App\Models\Governorate;
use App\Models\IndependentTeam;
use App\Models\MedicalRecord;
use App\Models\Organization;
use App\Models\User;
use App\Policies\AdoptionRequestPolicy;
use App\Policies\AIScanPolicy;
use App\Policies\AnimalPolicy;
use App\Policies\GovernoratePolicy;
use App\Policies\IndependentTeamPolicy;
use App\Policies\MedicalRecordPolicy;
use App\Policies\OrganizationPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Animal::class, AnimalPolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(MedicalRecord::class, MedicalRecordPolicy::class);
        Gate::policy(AdoptionRequest::class, AdoptionRequestPolicy::class);
        Gate::policy(AIScan::class, AIScanPolicy::class);
        Gate::policy(Organization::class, OrganizationPolicy::class);
        Gate::policy(Governorate::class, GovernoratePolicy::class);
        Gate::policy(IndependentTeam::class, IndependentTeamPolicy::class);
    }
}
