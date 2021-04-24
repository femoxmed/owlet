<?php

namespace App\Policies;

use App\BrandModel;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandModelPolicy
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
     * @param  \App\BrandModel  $brandModel
     * @return mixed
     */
    public function view(User $user, BrandModel $brandModel)
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
     * @param  \App\BrandModel  $brandModel
     * @return mixed
     */
    public function update(User $user, BrandModel $brandModel)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\BrandModel  $brandModel
     * @return mixed
     */
    public function delete(User $user, BrandModel $brandModel)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\BrandModel  $brandModel
     * @return mixed
     */
    public function restore(User $user, BrandModel $brandModel)
    {
        return $user->userable_type == 'App\Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\BrandModel  $brandModel
     * @return mixed
     */
    public function forceDelete(User $user, BrandModel $brandModel)
    {
        return $user->userable_type == 'App\Admin';
    }
}
