<?php

namespace Blog\Providers;

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
        'Blog\Model' => 'Blog\Policies\ModelPolicy',
        'Blog\Post'  => 'Blog\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //politica para actualizar post
        Gate::define('update', function ($user, $post) {
        return $user->id === $post->userid;
        });
    }
}
