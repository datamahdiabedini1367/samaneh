<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role->hasPermission('list_projects');
    }

    public function update(User $user)
    {
        return $user->role->hasPermission('edit_project');
    }

    public function view(User $user)
    {
        return $user->role->hasPermission('show_detail_project');
    }

    public function delete(User $user)
    {
        return $user->role->hasPermission('delete_project');
    }

    public function create(User $user)
    {
        return $user->role->hasPermission('create_project');
    }

    public function assign_user_to_project(User $user)
    {
        return $user->role->hasPermission('assign_user_to_project');

    }

    public function create_person_project(User $user)
    {
        return $user->role->hasPermission('create_person_project');

    }

    public function create_company_project(User $user)
    {
        return $user->role->hasPermission('create_company_project');

    }




}
