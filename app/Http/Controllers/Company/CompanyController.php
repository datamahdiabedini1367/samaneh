<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;

class CompanyController extends Controller
{

    public function index()
    {
        return view('companies.index', [
            'companies' => Company::all(),
        ]);

    }


    public function create()
    {
        return view('companies.create', [

        ]);
    }


    public function store(CompanyStoreRequest $request)
    {
//        dd($request->all());
        $company = Company::query()->create([
            'name' => $request->get('name'),
            'registration_date' => $request->get('registration_date'),
            'address' => $request->get('address'),
            'registration_number' => $request->get('registration_number'),
            'description' => $request->get('description'),
        ]);

        return redirect(route('contact.create', ['type' => 'company', 'data' => $company]));


    }


    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company
        ]);

    }


    public function edit(Company $company)
    {
//        dd($company);
        return view('companies.edit', [
            'company' => $company,
        ]);

    }


    public function update(CompanyUpdateRequest $request, Company $company)
    {

        $company->update([
            'name' => $request->get('name', $company->name),
            'registration_date' => $request->get('registration_date', $company->registration_date),
            'address' => $request->get('address', $company->address),
            'registration_number' => $request->get('registration_number', $company->registration_number),
            'description' => $request->get('description', $company->description),
        ]);

        $emails = array();
//        foreach ($request->get('emails') as $companyId => $itemValue) {
//            foreach ($itemValue['value'] as $emailId => $value) {
//                $emails[] = [
//                    'email_type' => Company::class,
//                    'email_id' => $companyId,
//                    'value' => $value,
//                    'id' => $emailId
//                ];
//            }
//        }
//        $emails = collect($emails)->filter(function ($item) use ($company) {
//            if (!empty($item['value'])) {
//                return $item;
//            }
//        })->toArray();

//        dd($emails);


//        foreach ($emails as $item) {
////            dd($item);
//            $isEmailAvilable = $company->emails()
//                ->where('value', $item['value'])
////                                    ->where('email_id','!=',$company->id)
//                ->exists();
//            dd($isEmailAvilable, $item);
//            if ($isEmailAvilable) {
//                return back()->withErrors(['message' => 'ایمیل وارد شده تکراری است']);
//            }
//            $company->emails()->updateOrCreate($item);
//        }

        return redirect(route('contact.create', ['type' => 'company', 'data' => $company]));

        return redirect(route('companies.index'));
    }


    public function destroy(Company $company)
    {

        $company->persons()->detach();
        $company->delete();

        return redirect(route('companies.index'));
    }
}
