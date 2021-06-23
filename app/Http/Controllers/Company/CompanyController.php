<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    public function __construct()
    {
//        $this->middleware(CheckPermission::class . ":list_companies")->only('index');
//       $this->middleware(CheckPermission::class . ":create_company")->only(['create','store']);
//        $this->middleware(CheckPermission::class . ":show_company")->only(['show']);
//        $this->middleware(CheckPermission::class . ":edit_company")->only(['edit','update']);
//        $this->middleware(CheckPermission::class . ":delete_company")->only('destroy');

        $this->middleware('auth');
//        $this->authorizeResource(Company::class);
    }

    public function index()
    {
//        Gate::authorize('list_companies');

        $this->authorize('isAccess',Permission::query()->where('title','list_companies')->first());

        return view('companies.index', [
            'companies' => Company::all(),
        ]);

    }


    public function create()
    {
//        if(!Gate::allows('create_company')){ return abort(403); }
//        if(Gate::denies('create_company')){ return abort(403); }

//        Gate::authorize('create_company');
        $this->authorize('isAccess',Permission::query()->where('title','create_company')->first());

        return view('companies.create');
    }


    public function store(CompanyStoreRequest $request)
    {
//        Gate::authorize('create_company');
//        if(!Gate::allows('create_company')){
//            return abort(403);
//        }
        $this->authorize('isAccess',Permission::query()->where('title','create_company')->first());

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
//        Gate::authorize('show_company',$company);
        $this->authorize('isAccess',Permission::query()->where('title','show_company')->first());

        return view('companies.show', [
            'company' => $company
        ]);
    }


    public function edit(Company $company)
    {
        $this->authorize('isAccess',Permission::query()->where('title','edit_company')->first());

//        if (Gate::none(['edit_company',['create_company']],$company)){ abort(403);}
//        if (!Gate::any(['edit_company',['create_company']],$company)){ abort(403);}
//        if (!Gate::check('edit_company',$company)){ abort(403);}
//        if(!Gate::allows('edit_company',$company)){ return abort(403); }
//        if(Gate::denies('edit_company',$company)){ return abort(403); }
//        Gate::authorize('edit_company',$company);
//        $company1=Company::query()->where('id',$company->id)->first();
//        $this->authorize('edit_company',$company1);

        return view('companies.edit', [
            'company' => $company,
        ]);
    }


    public function update(CompanyUpdateRequest $request, Company $company)
    {
//        Gate::authorize('edit_company',$company);
        $this->authorize('isAccess',Permission::query()->where('title','edit_company')->first());

        $company->update([
            'name' => $request->get('name', $company->name),
            'registration_date' => $request->get('registration_date', $company->registration_date),
            'address' => $request->get('address', $company->address),
            'registration_number' => $request->get('registration_number', $company->registration_number),
            'description' => $request->get('description', $company->description),
        ]);

//        $emails = array();
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

//        return redirect(route('companies.index'));
    }


    public function destroy(Company $company)
    {

//        Gate::authorize('delete_company',$company);
        $this->authorize('isAccess',Permission::query()->where('title','delete_company')->first());

        $company->persons()->detach();
        $company->delete();

        return redirect(route('companies.index'));
    }
}
