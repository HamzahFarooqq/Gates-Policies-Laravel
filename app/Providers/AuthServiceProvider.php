<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('tasks_create', fn(User $user) => $user->is_admin);
        Gate::define('tasks_edit', function(User $user){ return $user->is_admin; });
        Gate::define('tasks_delete', fn(User $user) => $user->is_admin);


        // another way to write gates--
        // Gate::define('update-post', [PostPolicy::class, 'update']);





        // official doc

        gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id  ;
        });


    }
}
