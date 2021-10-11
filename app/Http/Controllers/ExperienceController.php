<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Http\Requests\CompanyPersonStoreRequest;
use App\Models\Company;
use App\Models\CompanyPerson;
use App\Models\Permission;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExperienceController extends Controller
{
    //experience => سوابق شغلی
    public function experience_show(Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'show_savabegh_jobs')->first());

        return view('pages.persons.savabegh.show', [
            "person" => $person,
        ]);

    }

    public function experience_create(Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_savabegh_jobs')->first());
        $person->companies->pluck('id')->toArray();

        return view('pages.persons.savabegh.create', [
            "person" => $person,
            "companies" => arrayTwoItem(Company::all(['id', 'name'])->toArray()),
        ]);
    }

    public function experience_store(CompanyPersonStoreRequest $request, Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_savabegh_jobs')->first());
        //        $attributes = [
//            "startDate" => $request->get('startDate'),
//            "endDate" => $request->get('endDate'),
//            "semat" => $request->get('semat'),
//            "section" => $request->get('section'),
//            "reasonLeavingJob" => $request->get('reasonLeavingJob'),
//        ];
//        $person->companies()->attach($request->get('company_id'), $attributes);
        CompanyPerson::query()->create([
            "person_id" => $person->id,
            "company_id" => $request->get('company_id'),
            "startDate" => $request->get('startDate'),
            "endDate" => $request->get('endDate'),
            "semat" => $request->get('semat'),
            "section" => $request->get('section'),
            "reasonLeavingJob" => $request->get('reasonLeavingJob'),
        ]);

        return redirect(route('experience.show', $person));

    }

    public function experience_update(CompanyPersonStoreRequest $request, CompanyPerson $companyPerson)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_savabegh_jobs')->first());

        $companyPerson->update([
            "company_id" => $request->get('company_id'),
            "startDate" => $request->get('startDate'),
            "endDate" => $request->get('endDate'),
            "semat" => $request->get('semat'),
            "section" => $request->get('section'),
            "reasonLeavingJob" => $request->get('reasonLeavingJob'),
        ]);

        $person = Person::query()->where('id', $companyPerson->person_id)->first();

        return redirect(route('experience.show', $person));
    }

    public function experience_edit($id)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_savabegh_jobs')->first());
        $companyPerson = DB::table('company_person')->where('id', $id)->first();
        return view('pages.persons.savabegh.edit', [
            'companyPerson' => $companyPerson,
            'person' => Person::query()->where('id', $companyPerson->person_id)->first(),
            "companies" => arrayTwoItem(Company::all(['id', 'name'])->toArray()),
        ]);


    }


    public function experience_destroy($id)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_savabegh_jobs')->first());
        $companyPerson = CompanyPerson::query()->where('id', $id)->first();
        $person = Person::query()->where('id', $companyPerson->person_id)->first();
        $companyPerson->delete();
        return redirect(route('experience.show', $person));
    }

    public function exportExperienceOne(Person $person)
    {
        $export = new ExportExcel(['person' => $person], "pages.persons.savabegh.exportSavabegh");
        return Excel::download($export, 'ExperiencePerson.xlsx');
    }
    //
}
