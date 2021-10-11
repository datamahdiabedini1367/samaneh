<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountType;
use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{

    public function show($type, $data)
    {
//         $accountType = arrayTwoItem(AccountType::all(['id', 'title'])->sortBy('id')->toArray());
//        dd($accountType);
        if ($type == 'company') {
            $company = Company::query()->whereId($data)->first();
//            dd(arrayTwoItem(AccountType::all(['id','title'])->toArray()),);
            return view('pages.common.account.show', [
                'type' => $type,
                'dataId' => $data,
                'title' => $company->name,
                'item' => $company,
                'accountTypes' =>AccountType::all() ,
            ]);
        }
        if ($type == 'person') {
            $person = Person::query()->whereId($data)->first();
//            dd($type,$person,$data);
            return view('pages.common.account.show', [
                'type' => $type,
                'dataId' => $data,
                'title' => $person->firstName . ' ' . $person->lastName,
                'item' => $person,
                'accountTypes' => AccountType::all(),

            ]);
        }
    }

    public function create($type, $data)
    {
        $accountType = arrayTwoItem(AccountType::all(['id', 'title'])->sortBy('id')->toArray());
        if ($type == 'company') {
            $company = Company::query()->whereId($data)->first();
//            dd(arrayTwoItem(AccountType::all(['id','title'])->toArray()),);
            return view('pages.common.account.create', [
                'type' => $type,
                'dataId' => $data,
                'title' => $company->name,
                'item' => $company,
                'accountTypes' => $accountType,
            ]);
        }
        if ($type == 'person') {
            $person = Person::query()->whereId($data)->first();
//            dd($type,$person,$data);
            return view('pages.common.account.create', [
                'type' => $type,
                'dataId' => $data,
                'title' => $person->firstName . ' ' . $person->lastName,
                'item' => $person,
                'accountTypes' => $accountType,

            ]);
        }

    }

    public function store(Request $request, $type, $id)
    {
        if ($request->get('id_type_account') == 999) {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'unique:account_types,title'],
            ],
                [
                    'title.required' => 'نوع اکانت اجباریست ',
                    'title.unique' => 'عنوانی که برای نوع اکانت انتخاب کردید تکراری است',
                ]);
            if (!$validator->passes()) {
                return redirect(route('account.create', [$type, $id]))
                    ->withErrors($validator)
                    ->withInput();
            }
            $id_type_account = AccountType::query()->create([
                'title' => $request->get('title'),
            ]);
            $id_type_account = $id_type_account->id;

        } else {
            $validator = Validator::make($request->all(), [
                'value' => ['required', 'string'],
                'id_type_account' => ['required', 'string', 'exists:account_types,id'],
            ],
                [
                    'value.required' => "مقدار اجباریست",
                    "id_type_account.required" => 'نوع اکانت اجباریست',
                    "id_type_account.exists" => 'نوع اکانت انتخاب شده اشتباه است',
                ]);

            if (!$validator->passes()) {
                return redirect(route('account.create', [$type, $id]))
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        if ($type == 'company') {
            $account_type = Company::class;
        } else if ($type == 'person') {
            $account_type = Person::class;
        }
        Account::query()->create([
            "value" => $request->get('value'),
            "account_type" => $account_type,
            "account_id" => $id,
            "id_type_account" => $request->get('id_type_account') == 999 ? $id_type_account : $request->get('id_type_account'),
        ]);

        return redirect(route("account.show", [$type, $id]));
    }

    public function edit(Account $account)
    {
//        "id" => 5
//    "id_type_account" => 2
//    "value" => "@091254879633"
//    "account_type" => "App\Models\Person"
//    "account_id" => 1
//    "created_at" => "2021-07-31 10:22:29"
//    "updated_at" => "2021-07-31 10:22:29"
//    "deleted_at" => null

        if (Company::class === $account->account_type) {
            $company = Company::query()->whereId($account->account_id)->first();
            $title = $company->name;
            $type = 'company';
        } else if (Person::class === $account->account_type) {
            $person = Person::query()->whereId($account->account_id)->first(['firstName', 'lastName']);
            $title = $person->firstName . ' ' . $person->lastName;
            $type = 'person';
        }


        return view('pages.common.account.edit', [
            'type' => $type,
            'title' => $title,
            'account' => $account,
            'accountTypes' => arrayTwoItem(AccountType::all(['id', 'title'])->toArray()),
        ]);


//            $company = Company::query()->whereId($data)->first();
////            dd(arrayTwoItem(AccountType::all(['id','title'])->toArray()),);
//            return view('pages.common.account.create', [
//                'type' => $type,
//                'dataId' => $data,
//                'title' => $company->name,
//                'item' => $company,
//                'accountTypes' =>arrayTwoItem(AccountType::all(['id','title'])->toArray()),
//            ]);
//        }
//        if ($type == 'person') {
//            $person = Person::query()->whereId($data)->first();
////            dd($type,$person,$data);
//            return view('pages.common.account.create', [
//                'type' => $type,
//                'dataId' => $data,
//                'title' => $person->firstName . ' ' . $person->lastName,
//                'item' => $person,
//                'accountTypes' => AccountType::all(),
//
//            ]);
//        }

    }

    public function update(Request $request, Account $account)
    {
        if ($request->get('id_type_account') == 999) {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'unique:account_types,title'],
            ],
                [
                    'title.required' => 'نوع اکانت اجباریست ',
                    'title.unique' => 'عنوانی که برای نوع اکانت انتخاب کردید تکراری است',
                ]);
            if (!$validator->passes()) {
                return redirect(route('account.edit', [$account]))->withErrors($validator)->withInput();
            }

            $id_type_account = AccountType::query()->create(['title' => $request->get('title'),]);
            $id_type_account = $id_type_account->id;
        } else {
            $validator = Validator::make($request->all(), [
                'value' => ['required', 'string'],
                'id_type_account' => ['required', 'string', 'exists:account_types,id'],
            ],
                [
                    'value.required' => "مقدار اجباریست",
                    "id_type_account.required" => 'نوع اکانت اجباریست',
                    "id_type_account.exists" => 'نوع اکانت انتخاب شده اشتباه است',
                ]);
            $id_type_account = $request->get('id_type_account');

            if (!$validator->passes()) {
                return redirect(route('account.edit', [$account]))->withErrors($validator)->withInput();
            }
        }


        $account->update([
            'id_type_account' => $id_type_account,
            'value' =>$request->get('value'),
        ]);
        if (substr_count($account->account_type, 'Company') >= 1) {
            $type = "company";
        } else if (substr_count($account->account_type, 'Person') >= 1) {
            $type = "person";
        }
        return redirect(route("account.show", [$type, $account->account_id]));
    }

    public function destroy(Account $account)
    {
        if (substr_count($account->account_type, 'Company') >= 1) {
            $type = "company";
        } else if (substr_count($account->account_type, 'Person') >= 1) {
            $type = "person";
        }
        $account->delete();
        return redirect(route("account.show", [$type, $account->account_id]));
    }


}
