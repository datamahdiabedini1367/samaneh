<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyPersonStoreRequest;
use App\Models\Company;
use App\Models\Permission;
use App\Models\Person;
use Illuminate\Http\Request;

class CompanyPersonController extends Controller
{
    public function index(Company $company)
    {
        $this->authorize('isAccess',Permission::query()->where('title','list_persons_companies')->first());

        return view('companyPerson.index',[
            'company'=>$company,
        ]);
    }

    public function create(Company $company)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_person_company')->first());

        return view('companyPerson.create',[
            'company'=>$company,
            'persons'=>Person::all(),
        ]);

    }

    public function store(CompanyPersonStoreRequest $request, Company $company)
    {
//        dd($request->all(),$company);
        $this->authorize('isAccess',Permission::query()->where('title','create_person_company')->first());

        $attributes=[
            'person_id' =>$request->get('person_id'),
            'startDate' =>$request->get('startDate'),
            'endDate' =>$request->get('endDate'),
            'semat' =>$request->get('semat'),
            'section' =>$request->get('section'),
            'reasonLeavingJob' =>$request->get('reasonLeavingJob'),
        ];

        $company->persons()->attach($company->id,$attributes);
        return redirect(route('companies.persons.index',[
            'company'=>$company,
        ]));
    }

    public function destroyForm(Company $company){
        $this->authorize('isAccess',Permission::query()->where('title','delete_person_company')->first());

        return view('companyPerson.destroy_form',[
            'company'=>$company,
        ]);
    }

    public function destroy(Company $company,Person $person)
    {
        $this->authorize('isAccess',Permission::query()->where('title','delete_person_company')->first());

        $company->persons()->detach($person);
        return redirect(route('companies.persons.destroyForm',$company));

    }


}
