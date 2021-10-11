<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\Company;
use App\Models\CompanyPerson;
use App\Models\Educational;
use App\Models\Email;
use App\Models\Person;
use App\Models\PersonRelated;
use App\Models\Phone;
use App\Models\Photo;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Observers\AccountObserver;
use App\Observers\CompanyObserver;
use App\Observers\CompanyPersonObserver;
use App\Observers\EducationalObserver;
use App\Observers\EmailObserver;
use App\Observers\PersonObserver;
use App\Observers\PersonRelatedObserver;
use App\Observers\PhoneObserver;
use App\Observers\PhotoObserver;
use App\Observers\ProjectObserver;
use App\Observers\RoleObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Company::observe(CompanyObserver::class);
        CompanyPerson::observe(CompanyPersonObserver::class);
        Educational::observe(EducationalObserver::class);
        Email::observe(EmailObserver::class);
        Person::observe(PersonObserver::class);
        PersonRelated::observe(PersonRelatedObserver::class);
        Phone::observe(PhoneObserver::class);
        Photo::observe(PhotoObserver::class);
        Project::observe(ProjectObserver::class);
        Role::observe(RoleObserver::class);
        Account::observe(AccountObserver::class);
//        User::observe(new UserObserver());
    }
}
