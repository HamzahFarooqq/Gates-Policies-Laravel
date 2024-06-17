<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;

use App\Policies\PostPolicy;
use Illuminate\Auth\Access\Response;
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



        Gate::define('show-post', function(User $user, Post $post) {
            // return $user->id === $post->user_id  || $user->is_admin == 1;
            return $user->is_admin == 0;

        });



        Gate::define('edit-settings', function (User $user) {
            return $user->is_admin == 1
                        ? Response::allow()
                        : Response::deny('You must be an administrator.');
                        
        });



        // Gate::before(function (User $user, string $ability) { 
            // this $user->isAdministrator() should be define in model           
            // if ($user->isAdministrator()) {                
            //     return true;
            // }
            
            // if ($user->isRegular()) {
            //     return true;
            // }
        // });



        // API GATES SYSTEM FOR MULTI ROLES 

        Gate::define('admin', function (User $user) {
            return $user->is_admin == 1;
        });

        Gate::define('regular-user', function (User $user) {
            return $user->is_admin == 0;
        });

        Gate::define('own-post', function (User $user, Post $post) {            
            return $user->id == $post->user_id;
        });






    }
}
