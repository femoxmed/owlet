<?php

namespace App\Policies;

use App\SubscriptionPlan;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPlanPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubscriptionPlan  $subplan
     * @return mixed
     */
    public function view(User $user, SubscriptionPlan $subplan)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubscriptionPlan  $subplan
     * @return mixed
     */
    public function update(User $user, SubscriptionPlan $subplan)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubscriptionPlan  $subplan
     * @return mixed
     */
    public function delete(User $user, SubscriptionPlan $subplan)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubscriptionPlan  $subplan
     * @return mixed
     */
    public function restore(User $user, SubscriptionPlan $subplan)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubscriptionPlan  $subplan
     * @return mixed
     */
    public function forceDelete(User $user, SubscriptionPlan $subplan)
    {
        return true;
    }
}
