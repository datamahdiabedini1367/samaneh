<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
//        return $user->role->hasPermission(11);
        return $user->role->hasPermission('list_companies');
    }

    public function view(User $user, Company $company)
    {
        return $user->role->hasPermission('show_company')
               && !empty($company);
    }

    public function create(User $user)
    {
        return $user->role->hasPermission('create_company');
    }

    public function update(User $user, Company $company)
    {
        $isAuthorized= $user->role->hasPermission('edit_company')
            && !empty($company);

        return $isAuthorized ? Response::allow() : Response::deny('شما به این بخش دسترسی ندارید');
    }

    public function delete(User $user, Company $company)
    {
        return $user->role->hasPermission('delete_company') && !empty($company);
    }

    public function create_picture_company(User $user, Company $company)
    {
        return $user->role->hasPermission('create_picture_company') && !empty($company);
    }

    public function delete_picture_company(User $user, Company $company)
    {
        return $user->role->hasPermission('delete_picture_company') && !empty($company);
    }

    public function list_gallery_companies(User $user)
    {
        return $user->role->hasPermission('list_gallery_companies');
    }

    public function list_syberspace_companies(User $user)
    {
        return $user->role->hasPermission('list_syberspace_companies');
    }

    public function list_persons_companies(User $user)
    {
        return $user->role->hasPermission('list_persons_companies');
    }

    public function create_person_company(User $user)
    {
        return $user->role->hasPermission('create_person_company');
    }

    public function delete_person_company(User $user)
    {
        return $user->role->hasPermission('delete_person_company');
    }


}
