<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Permission;
use App\Models\Person;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'dashboard')->first());

        return view('pages.dashboard.index',[
            'countUser'=>User::query()->count(),
            'countPerson'=>Person::query()->count(),
            'countCompany'=>Company::query()->count(),
            'countProject'=>Project::query()->count(),
        ]);
    }
}
