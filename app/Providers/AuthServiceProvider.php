<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\Company;
use App\Models\Educational;
use App\Models\Email;
use App\Models\Individual;
use App\Models\Permission;
use App\Models\Person;
use App\Models\PersonRelated;
use App\Models\Phone;
use App\Models\Photo;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Policies\AllPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
//        'App\Models\Company' => 'App\Policies\CompanyPolicy',
//        'App\Models\User' => 'App\Policies\UserPolicy',
//        'App\Models\Project' => 'App\Policies\ProjectPolicy',

        User::class => AllPolicy::class,
        Account::class => AllPolicy::class,
        Company::class => AllPolicy::class,
        Educational::class => AllPolicy::class,
        Email::class => AllPolicy::class,
        Individual::class => AllPolicy::class,
        Permission::class => AllPolicy::class,
        Person::class => AllPolicy::class,
        PersonRelated::class => AllPolicy::class,
        Phone::class => AllPolicy::class,
        Photo::class => AllPolicy::class,
        Project::class => AllPolicy::class,
        Role::class => AllPolicy::class,


    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /***
//-----------------------------Company-------------------------------------
        Gate::define('create_company', [CompanyPolicy::class, 'create']);
//        Gate::define('create_company',function (User  $user){
//            return $user->role->hasPermission('create_company');
//        });
//
        Gate::define('edit_company', [CompanyPolicy::class, 'update']);
//        Gate::define('edit_company',function (User  $user,Company $company){
//            $isAuthorized= $user->role->hasPermission('edit_company')
//                && !empty($company);
//
//            return $isAuthorized ? Response::allow() : Response::deny('شما به این بخش دسترسی ندارید');
//        });
        Gate::define('delete_company', [CompanyPolicy::class, 'delete']);
//        Gate::define('delete_company',function (User  $user){
//            return $user->role->hasPermission('delete_company');
//        });
//
        Gate::define('show_company', [CompanyPolicy::class, 'view']);
//        Gate::define('show_company',function (User  $user){
//            return $user->role->hasPermission('show_company');
//        });
//
        Gate::define('list_companies', [CompanyPolicy::class, 'viewAny']);
//        Gate::define('list_companies',function (User  $user){
//            return $user->role->hasPermission('list_companies');
//        });
//
        Gate::define('list_gallery_companies', [CompanyPolicy::class, 'list_gallery_companies']);

        Gate::define('create_picture_company', [CompanyPolicy::class, 'create_picture_company']);

        Gate::define('delete_picture_company', [CompanyPolicy::class, 'delete_picture_company']);

        Gate::define('list_syberspace_companies', [CompanyPolicy::class, 'list_syberspace_companies']);

        Gate::define('list_persons_companies', [CompanyPolicy::class, 'list_persons_companies']);

        Gate::define('create_person_company', [CompanyPolicy::class, 'create_person_company']);

        Gate::define('delete_person_company', [CompanyPolicy::class, 'delete_person_company']);
//-----------------------------------User------------------------------------
        Gate::define('list_users', [UserPolicy::class, 'viewAny']);
        Gate::define('delete_user', [UserPolicy::class, 'delete']);
        Gate::define('create_user', [UserPolicy::class, 'create']);
        Gate::define('active_user', [UserPolicy::class, 'active_user']);
        Gate::define('change_role', [UserPolicy::class, 'change_role']);
        Gate::define('login', [UserPolicy::class, 'login']);
        Gate::define('my_project', [UserPolicy::class, 'my_project']);

//-----------------------------------Project------------------------------------

        Gate::define('list_projects', [ProjectPolicy::class, 'viewAny']);
        Gate::define('edit_project', [ProjectPolicy::class, 'update']);
        Gate::define('create_project', [ProjectPolicy::class, 'create']);
        Gate::define('show_detail_project', [ProjectPolicy::class, 'view']);
        Gate::define('delete_project', [ProjectPolicy::class, 'delete']);
        Gate::define('assign_user_to_project', [ProjectPolicy::class, 'assign_user_to_project']);
        Gate::define('create_person_project', [ProjectPolicy::class, 'create_person_project']);
        Gate::define('create_company_project', [ProjectPolicy::class, 'create_company_project']);


        //
         */
    }
}
