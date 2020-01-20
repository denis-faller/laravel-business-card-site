<?php

namespace BusinessCardSite\Policies;

use BusinessCardSite\Model\StaticPage;
use BusinessCardSite\Model\User;
use BusinessCardSite\Model\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaticPagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any static pages.
     *
     * @param  \BusinessCardSite\Model\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the static page.
     *
     * @param  \BusinessCardSite\Model\User  $user
     * @param  \BusinessCardSite\StaticPage  $staticPage
     * @return mixed
     */
    public function view(User $user, StaticPage $staticPage)
    {
        //
    }

    /**
     * Determine whether the user can create static pages.
     * Проверяет пользователя на роль админа
     * @param  \BusinessCardSite\Model\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        if(Role::isAdmin($user->id)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the static page.
     *
     * @param  \BusinessCardSite\Model\User  $user
     * @param  \BusinessCardSite\StaticPage  $staticPage
     * @return mixed
     */
    public function update(User $user, StaticPage $staticPage)
    {
        if(Role::isAdmin($user->id)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the static page.
     *
     * @param  \BusinessCardSite\Model\User  $user
     * @param  \BusinessCardSite\StaticPage  $staticPage
     * @return mixed
     */
    public function delete(User $user, StaticPage $staticPage)
    {
        //
    }

    /**
     * Determine whether the user can restore the static page.
     *
     * @param  \BusinessCardSite\Model\User  $user
     * @param  \BusinessCardSite\StaticPage  $staticPage
     * @return mixed
     */
    public function restore(User $user, StaticPage $staticPage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the static page.
     *
     * @param  \BusinessCardSite\Model\User  $user
     * @param  \BusinessCardSite\StaticPage  $staticPage
     * @return mixed
     */
    public function forceDelete(User $user, StaticPage $staticPage)
    {
        //
    }
}
