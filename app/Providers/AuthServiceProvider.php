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

        Gate::define('is-owner', function ($user, $podcast) {

            return $user->id ===  $podcast->user_id
                ? Response::allow()
                : Response::deny('Vous n\'êtes pas le propriétaire de cette ressource.');
        });
    }
}
