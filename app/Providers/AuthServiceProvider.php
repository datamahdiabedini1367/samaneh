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

    }
}
