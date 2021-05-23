<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyPersonStoreRequest;
use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;

class CompanyPersonController extends Controller
{
    public function index(Company $company)
    {
        return view('companyPerson.index',[
            'company'=>$company,
        ]);
    }

    public function create(Company $company)
    {
        return view('companyPerson.create',[
            'company'=>$company,
            'persons'=>Person::all(),
        ]);

    }

    public function store(CompanyPersonStoreRequest $request, Company $company)
    {
        dd($request->all(),$company);
        $attributes=[
            'person_id' =>$request->get('person_id'),
            'startDate' =>$request->get('startDate'),
            'endDate' =>$request->get('endDate'),
            'semat' =>$request->get('semat'),
            'section' =>$request->get('section'),
            'reasonLeavingJob' =>$request->get('reasonLeavingJob'),
        ];

        $company->persons()->attach($company->id,$attributes);
    }
}
