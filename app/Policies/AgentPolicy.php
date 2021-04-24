<?php

namespace App\Policies;

use App\Agent;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentPolicy
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
        return true;
        // return $user->userable_type ==  'App\Admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function view(User $user, Agent $agent)
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
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function update(User $user, Agent $agent)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function delete(User $user, Agent $agent)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function restore(User $user, Agent $agent)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function forceDelete(User $user, Agent $agent)
    {
        return true;
    }
}
