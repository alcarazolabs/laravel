<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $usera
     * @return mixed
     */
    public function viewAny(User $usera)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $usera
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $usera, User $user, $perm=null)
    {
        if($usera->havePermission($perm[0])){
            //permitir ver [user.show]
            return true;
        }else if($usera->havePermission($perm[1])){
            //[userown.show]=index=1
            //permitir ver solo dueño
            return $usera->id == $user->id;
        }else{
            return false;
        }
        //verificar que el usuario id sea igual a su id
        //si un usuario tiene id diferente no podra ver.
        //return $usera->id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $usera
     * @return mixed
     */
    public function create(User $usera)
    {
        return $usera->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $usera
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $usera, User $user, $perm)
    {
        if($usera->havePermission($perm[0])){
            //permitir ver [user.show]
            return true;
        }else if($usera->havePermission($perm[1])){
            //[userown.show]=index=1
            //permitir ver solo dueño
            return $usera->id == $user->id;
        }else{
            return false;
        }
        
        //si un usuario tiene id diferente no podra ver.
        //return $usera->id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $usera
     * @param  \App\User  $user
     * @return mixed
     */
    /*
    public function delete(User $usera, User $user)
    {
        //
    }
    */

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $usera
     * @param  \App\User  $user
     * @return mixed
     */
    /*
    public function restore(User $usera, User $user)
    {
        //
    }
*/
    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $usera
     * @param  \App\User  $user
     * @return mixed
     */
    /*
    public function forceDelete(User $usera, User $user)
    {
        //
    }
    */
}
