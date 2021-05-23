<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Person;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Relation::morphMap([
//            'person' => Person::class,
//            'company' => Company::class,
//        ]);
    }
}
