<?php

namespace App\Providers;


use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::personalAccessTokensExpireIn(now()->addHours(2));
        Passport::refreshTokensExpireIn(now()->addMinutes(2));

        // ******************* ACTIVITY LOGS ****************** //
        Gate::define('view_activity_logs', function ($user) {
            return $user->hasRight('view_activity_logs') ? Response::allow() : Response::deny();
        });
        Gate::define('add_activity_logs', function ($user) {
            return $user->hasRight('add_activity_logs') ? Response::allow() : Response::deny();
        });
        Gate::define('edit_activity_logs', function ($user) {
            return $user->hasRight('edit_activity_logs') ? Response::allow() : Response::deny();
        });
        Gate::define('delete_activity_logs', function ($user) {
            return $user->hasRight('delete_activity_logs') ? Response::allow() : Response::deny();
        });
    }
}
