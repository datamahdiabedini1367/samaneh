<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountType;
use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CyberSpaceController extends Controller
{

    public function index()
    {
        
    }
    public function create($type, $data)
    {


        if ($type == 'company') {
            $company = Company::query()->whereId($data)->first();
            return view('cyberspace.create', [
                'type' => $type,
                'dataId' => $data,
                'title' => $company->name,
                'item' => $company,
                'accountTypes' => AccountType::all(),
            ]);
        }
        if ($type == 'person') {
            $person = Person::query()->whereId($data)->first();
            return view('cyberspace.create', [
                'type' => $type,
                'dataId' => $data,
                'title' => $person->firstName . '  ' . $person->lastName,
                'item' => $person,
                'accountTypes' => AccountType::all(),
            ]);
        }
    }


    public function store(Request $request, $type, $id)
    {
        if ($request->get('id_type_account') == 999) {

            $validator = Validator::make($request->all(), [
                'title' => ['required', 'unique:account_types,title'],
            ], ['title.unique' => 'عنوانی که برای نوع اکانت انتخاب کردید تکراری است']);
            if ($validator->passes()) {
                $id_type_account = AccountType::query()->create([
                    'title' => $request->get('title'),
                ]);
                $id_type_account = $id_type_account->id;
            } else {
                return redirect(route('syberspace.create', [$type, $id]))
                    ->withErrors($validator)
                    ->withInput();

            }
        }

        $validator = Validator::make($request->all(), [
            'value' => ['required', 'string'],
//            'id_type_account' => ['exists:account_types,id'],
        ], ['value.required' => "فیلد مقدار نمی تواند خالی باشد"]);

        if ($validator->passes()) {
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
            return redirect(route("syberspace.create", [$type, $id]));

        } else {
            return redirect(route('syberspace.create', [$type, $id]))
                ->withErrors($validator)
                ->withInput();

        }


//
//        $value = $request->get('value');
//        $id_type_account = $request->get('accountType');
//        $account_type = $type;
//        $account_id = $id;
//
//        dd($request->all(), $type, $id);
//
//        $value = $request->get('value');
//
//        $id_type_account = $request->get('accountType');
//
//
//        dd($request->all(), 'id_type_account = ' . $id_type_account, 'account_id=' . $account_id, ' account_type= ' . $account_type, ' value =' . $value);
//
//        $account = [];
//        if ($validator->passes()) {
//            if ($request->get('account_type') == 'person') {
//                $account_type = Person::class;
//            } else if ($request->get('account_type') == 'company') {
//                $account_type = Company::class;
//            }
//            $account = Account::query()->create([
//                "value" => $request->get('value'),
//                "account_type" => $account_type,
//                "account_id" => $request->get('account_id'),
//                "id_type_account" => $request->get('id_type_account'),
//            ]);
//            $account->id_type_account=$account->accountType()->title;
//            dd($account->id_type_account);
//            return response()->json([
//                'success' => 'رکورد با موفقیت ثبت شد',
//                'accountInsert' => $account,
//            ]);
//        }
//
//        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function update(Request $request, Account $account)
    {
        $account->update([
            'id_type_account' => $request->get('id_type_account', $account->id_type_account),
            'value' => $request->get('value', $account->value),
        ]);
//       dd(substr_count($account->account_type,'Company'));
        if (substr_count($account->account_type, 'Company') >= 1) {
            $type = "company";
        } else if (substr_count($account->account_type, 'Person') >= 1) {
            $type = "person";
        }

        return redirect(route("syberspace.create", [$type, $account->account_id]));

    }

    public function destroy(Account $account)
    {
        if (substr_count($account->account_type, 'Company') >= 1) {
            $type = "company";
        } else if (substr_count($account->account_type, 'Person') >= 1) {
            $type = "person";
        }
        $account->delete();
        return redirect(route("syberspace.create", [$type, $account->account_id]));

    }


}
