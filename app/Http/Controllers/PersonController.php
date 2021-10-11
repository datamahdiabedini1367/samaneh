<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Http\Requests\CompanyPersonStoreRequest;
use App\Http\Requests\PersonIndexRequest;
use App\Http\Requests\PersonStoreRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Http\Requests\SearchProjectRequest;
use App\Models\Company;
use App\Models\CompanyPerson;
use App\Models\Permission;
use App\Models\Person;
use App\Models\Project;
use App\Repositories\PersonRepositoryInterface;
use App\Rules\NationalCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PersonController extends Controller
{
    private $repository;
    public function __construct(PersonRepositoryInterface $repository)
    {
        $this->middleware('auth');
        $this->repository=$repository;
    }

    public function index(PersonIndexRequest $request)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'list_persons')->first());

        $field = $request->get('field');
        $phrase = $request->get('phrase');
        session()->put('field', $field);
        session()->put('phrase', $phrase);

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
                ->orderBy('id')->paginate();

        } else if ($request->has('field') && $field == 'birthdate') {
            $persons = Person::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else if ($request->has('field') && !empty($field) && !empty($phrase)) {
            $persons = Person::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else {
            $persons = Person::query()->paginate();
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


        return view('pages.persons.index', [
            'persons' => $persons,
            'fields'=>$fields
        ]);
    }

    public function create()
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_person')->first());
        return view('pages.persons.create');
    }

    public function store(PersonStoreRequest $request)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_person')->first());
        $this->validate($request,
            ['nationalCode' =>'nullable' , new NationalCode("کد ملی صحیح نمی باشد") ]
        );

        $person = Person::query()->create([
            'firstName' => $request->get('firstName'),
            'nikeName' => $request->get('nikeName'),
            'lastName' => $request->get('lastName'),
            'fatherName' => $request->get('fatherName'),
            'motherName' => $request->get('motherName'),
            'married' => $request->get('married'),
            'birthdate' => $request->get('birthdate'),
            'birthdatePlace' => $request->get('birthdatePlace'),
            'gender' => $request->get('gender'),
            'nationalCode' => $request->get('nationalCode'),
            'address' => $request->get('address'),
            'bio' => $request->get('bio'),
            'entertainments' => $request->get('entertainments'),
            'personalFavorites' => $request->get('personalFavorites'),
            'politicalOrientation' => $request->get('politicalOrientation'),
            'languageUse' => $request->get('languageUse'),
        ]);

        return redirect(route('persons.index'));
    }

    public function show(Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'show_person')->first());

        return view('pages.persons.show', [
            'person' => $this->repository->getPerson($person),
        ]);
    }

    public function edit(Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_person')->first());

        return view('pages.persons.edit', [
            'person' => $person
        ]);
    }

    public function update(PersonUpdateRequest $request, Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_person')->first());

        $this->validate($request,
            ['nationalCode' =>new NationalCode("کد ملی صحیح نمی باشد") ]
        );
        $person->update([
            'firstName' => $request->get('firstName', $person->firstName),
            'nikeName' => $request->get('nikeName', $person->nikeName),
            'lastName' => $request->get('lastName', $person->lastName),
            'fatherName' => $request->get('fatherName', $person->fatherName),
            'motherName' => $request->get('motherName', $person->motherName),
            'married' => $request->get('married', $person->married),
            'birthdate' => $request->get('birthdate', $person->birthdate),
            'birthdatePlace' => $request->get('birthdatePlace', $person->birthdatePlace),
            'gender' => $request->get('gender', $person->gender),
            'nationalCode' => $request->get('nationalCode', $person->nationalCode),
            'address' => $request->get('address', $person->address),
            'bio' => $request->get('bio', $person->bio),
            'entertainments' => $request->get('entertainments', $person->entertainments),
            'personalFavorites' => $request->get('personalFavorites', $person->personalFavorites),
            'politicalOrientation' => $request->get('politicalOrientation', $person->politicalOrientation),
            'languageUse' => $request->get('languageUse', $person->languageUse),
        ]);

        return redirect(route('persons.index'));
    }

    public function destroy(Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_person')->first());

        $person->companies()->detach();
        $person->relatedPerson()->detach();
        $person->educationals()->delete();

        $person->delete();
        return redirect(route('persons.index'));
    }

    public function export(Request $request)
    {
        $field =session()->get('field');
        $phrase=session()->get('phrase');

        if (session()->has('field') && $field == 'all') {
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
                ->orderBy('id')->get();

        } else if (session()->has('field') && $field == 'birthdate') {
            $persons = Person::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->get();
        } else if (session()->has('field') && !empty($field) && !empty($phrase)) {
            $persons = Person::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->get();
        } else {
            $persons = Person::query()->get();
        }

        $export = new ExportExcel(['persons' => $persons], "pages.persons.exports");
        return Excel::download($export, 'persons.xlsx');
    }

    public function exportOne(Person $person)
    {
        $export = new ExportExcel(['persons' => $person], "pages.persons.exportOne");
        return Excel::download($export, 'persons.xlsx');
    }

    public function list_project(SearchProjectRequest $request, Person $person)
    {
        $field = $request->get('field');
        $phrase = $request->get('phrase');
        session()->put('field', $field);
        session()->put('phrase', $phrase);

        if ($request->has('field') && $field == 'all')
        {
            $projects = Project::query()->where('name', 'like', "%{$phrase}%")
                ->orWhere('description', 'like', "%{$phrase}%")
                ->orWhere('endDate', 'like', "%{$phrase}%")
                ->orWhere('startDate', 'like', "%{$phrase}%")
                ->orderBy('id')->paginate();

        } else if($request->has('field') && $field == 'startDate')
        {
            $phrase = convert_date($phrase,'gregorian');
            $projects = Project::query()->where($field,'like',"%{$phrase}%")->orderBy('id')->paginate();
        } else if($request->has('field') && $field == 'endDate'){
            $phrase = convert_date($phrase,'gregorian');
            $projects = Project::query()->where($field,'like',"%{$phrase}%")->orderBy('id')->paginate();
        } else if($request->has('field') && !empty($phrase)){
            $projects = Project::query()->where($field,'like',"%{$phrase}%")->orderBy('id')->paginate();
        } else{
            $projects = Project::query()->paginate();
        }

        $fields=['name'=>'نام پروژه','startDate'=>'تاریخ شروع پروژه','description'=>'توضیحات پروژه','endDate'=>'تاریخ پایان پروژه','all'=>'همه موارد'];

        return view('pages.persons.list_project', [
            'projects' => $projects,
            'person' => $person,
            'fields'=>$fields,
        ]);

    }





}
