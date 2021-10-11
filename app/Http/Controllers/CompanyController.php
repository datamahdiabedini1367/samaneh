<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\ExportComanyRequest;
use App\Http\Requests\IndexRequest;
use App\Models\Company;
use App\Models\Permission;
use App\Rules\UniqueOtherSelf;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function export(ExportComanyRequest $request)
    {
        $field = session()->get('field');
        $phrase = session()->get('phrase');
        if (session()->has('field') && $field == 'all') {
            $companies = Company::query()->where('name', 'like', "%{$phrase}%")
                ->orWhere('registration_number', 'like', "%{$phrase}%")
                ->orWhere('address', 'like', "%{$phrase}%")
                ->orWhere('description', 'like', "%{$phrase}%")
                ->orderBy('id')->get();
        } else if (session()->has('field') && $field == 'registration_date') {
            $phrase = convert_date($phrase, 'gregorian');
            $companies = Company::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->get();
        } else if (session()->has('field') && !empty($field) && !empty($phrase)) {
            $companies = Company::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->get();
        } else {
            $companies = Company::query()->get();
        }

        $export = new ExportExcel(['companies' => $companies], "pages.companies.exports");
        return Excel::download($export, 'companies.xlsx');
    }

    public function exportOne(Company $company)
    {
        $company['registration_date'] = convert_date($company['registration_date'], 'gregorian');
        $export = new ExportExcel(['company' => $company], "pages.companies.exportOne");
        return Excel::download($export, 'company.xlsx');
    }

    public function index(IndexRequest $request)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'list_companies')->first());
        $field = $request->get('field');
        $phrase = $request->get('phrase');

        session()->put('field', $field);
        session()->put('phrase', $phrase);

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

        return view('pages.companies.index', [
            'companies' => $companies,
            'fields' => $fields,
        ]);
    }

    public function create()
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_company')->first());
        return view('pages.companies.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_company')->first());

        $company = Company::query()->create([
            'name' => $request->get('name'),
            'registration_date' => $request->get('registration_date'),
            'address' => $request->get('address'),
            'registration_number' => $request->get('registration_number'),
            'description' => $request->get('description'),
        ]);

        return redirect(route('companies.index'));
    }

    public function show(Company $company)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'show_company')->first());

        return view('pages.companies.show', [
            'company' => $company
        ]);
    }

    public function edit(Company $company)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_company')->first());
        return view('pages.companies.edit', [
            'company' => $company,
        ]);
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_company')->first());

        $this->validate($request,
            ['name' => new UniqueOtherSelf('companies', 'name', $company->id, "نام شرکت قبلا در سیستم ذخیره شده و نمی تواند تکراری باشد.")]
        );

        $company->update([
            'name' => $request->get('name', $company->name),
            'registration_date' => $request->get('registration_date', $company->registration_date),
            'address' => $request->get('address', $company->address),
            'registration_number' => $request->get('registration_number', $company->registration_number),
            'description' => $request->get('description', $company->description),
        ]);

        return redirect(route('companies.index'));
    }

    public function destroy(Company $company)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_company')->first());
        $company->persons()->detach();
        $company->delete();

        return redirect(route('companies.index'));
    }

}
