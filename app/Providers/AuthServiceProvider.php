<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Policies\NewsPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\News;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        News::class => NewsPolicy::class,
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

        Gate::resource('news', NewsPolicy::class);
        // Gate::define('post.new', NewsPolicy::class . '@new');
        Gate::resource('users', UserPolicy::class);

        Gate::before(function ($user) {
            if($user->id === 1){
                return true;
            }
        });
    }
}
