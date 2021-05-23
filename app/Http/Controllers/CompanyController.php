<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        return view('companies.index',[
            'companies'=>Company::all(),
        ]);

    }


    public function create()
    {
        return view('companies.create',[

        ]);
    }


    public function store(CompanyStoreRequest $request)
    {
        $comany = Company::query()->create([
            'name'=>$request->get('name'),
            'registration_date'=>$request->get('registration_date'),
            'email'=>$request->get('email'),
            'address'=>$request->get('address'),
            'registration_number'=>$request->get('registration_number'),
            'description'=>$request->get('description'),
        ]);

        return redirect(route('companies.index'));

    }


    public function show(Company $company)
    {

    }


    public function edit(Company $company)
    {
        return view('companies.edit',[
            'company'=> $company,
        ]);

    }


    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update([
            'name'=>$request->get('name',$company->name),
            'registration_date'=>$request->get('registration_date',$company->registration_date),
            'email'=>$request->get('email',$company->email),
            'address'=>$request->get('address',$company->address),
            'registration_number'=>$request->get('registration_number',$company->registration_number),
            'description'=>$request->get('description',$company->description),
        ]);

        return redirect(route('companies.index'));
    }


    public function destroy(Company $company)
    {

        $company->delete();

        return redirect(route('companies.index'));
    }
}
