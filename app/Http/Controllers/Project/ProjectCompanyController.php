<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCompanyAssign;
use App\Models\Company;
use App\Models\Permission;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectCompanyController extends Controller
{
    public function assign(Project  $project)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_company_project')->first());

        return view('project.projectCompany.assign',[
            'project'=>$project,
            'companies'=>Company::all(),
        ]);

    }

    public function store(Project $project,Company $company)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_company_project')->first());

        $isCompanyAssignBefore = $project->companies()
                                      ->where('company_id',$company->id)
                                      ->exists();
//        dd($isCompanyAssignBefore);
        if ($isCompanyAssignBefore){
            $project->companies()->detach($company);
        }else {
            $project->companies()->attach($company);
        }
        return response(['count_company'=>$project->companies()->count(),],200);
    }
}
