<?php

namespace App\Policies;

use App\Advert;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
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
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function view(User $user, Advert $advert)
    {
        if ($user->userable_type == 'App\Agent') {
            return $user->userable->id == $advert->agent->id;
        }
        else if ($user->userable_type == 'App\Dealer') {
            return $user->userable->id == $advert->dealer->id;
        }
        else if ($user->userable_type == 'App\Admin') {
            return true;
        }
        else return false;
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
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function update(User $user, Advert $advert)
    {
        if ($user->userable_type == 'App\Agent') {
            return $user->userable->id == $advert->agent->id;
        }
        else if ($user->userable_type == 'App\Dealer') {
            return $user->userable->id == $advert->dealer->id;
        }
        else if ($user->userable_type == 'App\Admin') {
            return true;
        }
        else return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function delete(User $user, Advert $advert)
    {
        if ($user->userable_type == 'App\Agent') {
            return $user->userable->id == $advert->agent->id;
        }
        else if ($user->userable_type == 'App\Dealer') {
            return $user->userable->id == $advert->dealer->id;
        }
        else if ($user->userable_type == 'App\Admin') {
            return true;
        }
        else return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function restore(User $user, Advert $advert)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function forceDelete(User $user, Advert $advert)
    {
        if ($user->userable_type == 'App\Agent') {
            return $user->userable->id == $advert->agent->id;
        }
        else if ($user->userable_type == 'App\Dealer') {
            return $user->userable->id == $advert->dealer->id;
        }
        else if ($user->userable_type == 'App\Admin') {
            return true;
        }
        else return false;
    }
}
