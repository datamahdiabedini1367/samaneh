<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AllPolicy
{
    use HandlesAuthorization;




    public function isAccess(User $user,Permission $access)
    {
        $isAuthorized= $user->role->hasPermission($access);
        return $isAuthorized ? Response::allow() : Response::deny('شما به این بخش دسترسی ندارید');

//        return $user->role->hasPermission($access);
    }
}
