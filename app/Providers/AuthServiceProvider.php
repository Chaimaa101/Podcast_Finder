<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('is-owner', function (User $user, $model) {

    // Case 1: Model has user_id directly
    if (property_exists($model, 'user_id') && $model->user_id === $user->id) {
        return Response::allow();
    }

    // Case 2: Model is Podcast (or has 'podcast' relation)
    if (method_exists($model, 'podcast') && $model->podcast?->user_id === $user->id) {
        return Response::allow();
    }

    return Response::deny("Vous n'êtes pas le propriétaire de cette ressource.");
});

    }
}
