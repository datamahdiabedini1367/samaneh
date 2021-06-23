<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->role->hasPermission('list_users');
    }

    public function login(User $user)
    {
        return $user->role->hasPermission('login');
    }


    public function view(User $user, User $model)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role->hasPermission('create_user');
    }

    public function active_user(User $user)
    {
        return $user->role->hasPermission('active_user');
    }

    public function change_role(User $user)
    {
        return $user->role->hasPermission('change_role');
    }


    public function update(User $user, User $model)
    {

    }


    public function delete(User $user, User $model)
    {
        return $user->role->hasPermission('delete_user') && !empty($model);
    }



    public function my_project(User $user)
    {
//        dd('myproject');
        return $user->role->hasPermission('my_project');

    }
}
