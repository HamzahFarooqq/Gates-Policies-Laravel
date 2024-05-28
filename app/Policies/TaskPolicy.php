<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_admin;

        // this way of writing, if you have separate Role table, and have 'role_id' column in users table then use this pattern

        // return $user->role_id == 2;     //admin

        // return $user->role_id == Role::IS_ADMIN;     //admin

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        return $user->is_admin || (auth()->check() && $task->user_id == auth()->id());

        // this way of writing, if you have separate Role table, and have 'role_id' column in users table then use this pattern

        // return in_array($user->role_id, [2,3]) ||  (auth()->check() && $task->user_id == auth()->id());

        // return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_MANAGER]) ||  (auth()->check() && $task->user_id == auth()->id());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        //
    }
}
