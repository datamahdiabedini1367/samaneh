<?php

namespace App\Http\Controllers;

use App\Exports\CompaniesExport;
use App\Exports\ExportExcel;
use App\Http\Requests\CompanyPersonStoreRequest;
use App\Models\Company;
use App\Models\CompanyPerson;
use App\Models\Permission;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CompanyPersonController extends Controller
{
    public function index(Company $company)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'list_persons_companies')->first());
        return view('pages.companies.persons.index', [
            'company' => $company,
        ]);
    }

    public function create(Request $request, Company $company)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_person_company')->first());
        $field = $request->get('field');
        $phrase = $request->get('phrase');


        $personExists = DB::table('company_person')->where('company_id', $company->id)->pluck('person_id');


        if ($request->has('field') && $field == 'all') {
            $persons = Person::query()->where('firstName', 'like', "%{$phrase}%")
                ->orWhere('nikeName', 'like', "%{$phrase}%")
                ->orWhere('lastName', 'like', "%{$phrase}%")
                ->orWhere('fatherName', 'like', "%{$phrase}%")
                ->orWhere('motherName', 'like', "%{$phrase}%")
                ->orWhere('birthdatePlace', 'like', "%{$phrase}%")
                ->orWhere('nationalCode', 'like', "%{$phrase}%")
                ->orWhere('address', 'like', "%{$phrase}%")
                ->orWhere('bio', 'like', "%{$phrase}%")
                ->orWhere('entertainments', 'like', "%{$phrase}%")
                ->orWhere('personalFavorites', 'like', "%{$phrase}%")
                ->orWhere('politicalOrientation', 'like', "%{$phrase}%")
                ->orWhere('languageUse', 'like', "%{$phrase}%")
                ->whereNotIn('id', $personExists)
                ->orderBy('id')->paginate();
        } else if ($request->has('field') && $field == 'birthdate') {
            $phrase = convert_date($phrase, 'gregorian');
            $persons = Person::query()
                ->where($field, 'like', "%{$phrase}%")
                ->whereNotIn('id', $personExists)
                ->orderBy('id')->paginate();
        } else if ($request->has('field') && !empty($field) && !empty($phrase)) {
            $persons = Person::query()
                ->where($field, 'like', "%{$phrase}%")
                ->whereNotIn('id', $personExists)
                ->orderBy('id')->paginate();
        } else {
            $persons = Person::query()
                ->whereNotIn('id', $personExists)
                ->paginate();
        }

        $fields = [
            'firstName' => 'نام',
            'nikeName' => 'نام مستعار',
            'lastName' => 'نام خانوادگی',
            'fatherName' => 'نام پدر',
            'motherName' => 'نام مادر',
            'birthdate' => 'تاریخ تولد',
            'birthdatePlace' => 'مکان تولد',
            'nationalCode' => 'کد ملی',
            'address' => 'آدرس',
            'bio' => 'بیوگرافی',
            'entertainments' => 'سرگرمی ها',
            'personalFavorites' => 'علایق شخصی',
            'politicalOrientation' => 'گرایش سیاسی',
            'languageUse' => 'زبانهای مورد استفاده',
            'all' => 'همه موارد'
        ];

        return view('pages.companies.persons.create', [
            'company' => $company,
            'persons' => $persons,
            'fields' => $fields
        ]);

    }

    public function exportPersonSavabegh(Person $person)
    {
        $export = new ExportExcel(['persons' => $person], "pages.persons.exportPersonSavabegh");
        return Excel::download($export, 'SavabeghPerson.xlsx');
    }

    public function store(CompanyPersonStoreRequest $request, Company $company)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_person_company')->first());

        $this->validate($request,
            ['person_id' => 'required']
        );

//        $attributes = [
//            'person_id' => $request->get('person_id'),
//            'startDate' => $request->get('startDate'),
//            'endDate' => $request->get('endDate'),
//            'semat' => $request->get('semat'),
//            'section' => $request->get('section'),
//            'reasonLeavingJob' => $request->get('reasonLeavingJob'),
//        ];
//        $company->persons()->attach($company->id, $attributes);


//         'id', 'person_id', 'company_id', 'reasonLeavingJob', 'startDate', 'endDate', 'semat', 'section'
        CompanyPerson::query()->create([
            'company_id' => $company->id,
            'person_id' => $request->get('person_id'),
            'startDate' => $request->get('startDate'),
            'endDate' => $request->get('endDate'),
            'semat' => $request->get('semat'),
            'section' => $request->get('section'),
            'reasonLeavingJob' => $request->get('reasonLeavingJob'),
        ]);


        return redirect(route('companies.persons.index', [
            'company' => $company,
        ]));
    }

    public function destroyForm(Company $company)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_person_company')->first());

        return view('pages.companies.persons.destroy_form', [
            'company' => $company,
        ]);
    }

    public function destroy(Company $company, Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_person_company')->first());
        $companyPerson = CompanyPerson::query()->where('person_id', $person->id)->where('company_id', $company->id)->first();
        $companyPerson->delete();


        $company->persons()->detach($person);
        return redirect(route('companies.persons.destroyForm', $company));
    }

}
