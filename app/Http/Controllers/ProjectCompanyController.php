<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCompanyAssign;
use App\Models\Company;
use App\Models\Permission;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectCompanyController extends Controller
{
    public function assign(Request $request,Project  $project)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_company_project')->first());
        $field = $request->get('field');
        $phrase = $request->get('phrase');

        if ($request->has('field') && $field == 'all') {
            $companies = Company::query()->where('name', 'like', "%{$phrase}%")
                ->orWhere('registration_number', 'like', "%{$phrase}%")
                ->orWhere('address', 'like', "%{$phrase}%")
                ->orWhere('description', 'like', "%{$phrase}%")
                ->orderBy('id')->paginate();
        } else if ($request->has('field') && $field == 'registration_date') {
            $phrase = convert_date($phrase, 'gregorian');
            $companies = Company::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else if ($request->has('field') && !empty($field) && !empty($phrase)) {
            $companies = Company::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else {
            $companies = Company::query()->paginate();
        }

        $fields = [
            'name' => 'نام شرکت',
            'registration_number' => 'شماره ثبت',
            'registration_date' => 'تاریخ ثبت',
            'address' => 'آدرس',
            'description' => 'توضیحات',
            'all' => 'همه موارد'
        ];

        return view('pages.projects.companies.assign',[
            'project'=>$project,
            'companies'=>$companies,
            'fields'=>$fields
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
        return response(['count_company'=>$project->companies()->count(),]);
    }
}
