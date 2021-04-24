<?php

namespace App\Policies;

use App\Condition;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConditionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function view(User $user, Condition $condition)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function update(User $user, Condition $condition)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function delete(User $user, Condition $condition)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function restore(User $user, Condition $condition)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function forceDelete(User $user, Condition $condition)
    {
        return $user->userable_type == 'App\Admin';
    }
}
