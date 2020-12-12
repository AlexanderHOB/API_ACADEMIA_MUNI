<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Policies\UserPolicy;
use Laravel\Passport\Passport;
use App\Policies\StudentPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Student::class => StudentPolicy::class,
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-action',function($user){
            return $user->isAdmin();
        });
        Gate::define('update-admin',function($user,$authenticateUser){
            return $user->isAdmin();
        });
        Passport::routes(null, ['prefix' => 'api/oauth']);

        Passport::tokensExpireIn(Carbon::now()->addDays(30));
        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(180));
    }
}
