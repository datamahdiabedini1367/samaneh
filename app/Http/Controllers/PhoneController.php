<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneStoreRequest;
use App\Http\Requests\UpdatePhoneRequest;
use App\Models\Company;
use App\Models\Phone;
use App\Models\Person;
use App\Rules\UniqueOtherSelf;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function check(Request $request, $itemId)
    {
        $phoneIsUsed = Phone::query()
            ->where('value', $request->get('phone'))
            ->where('phone_id', '!=', $itemId)
            ->exists();

        if ($phoneIsUsed) {
            return response(['msg_error' => "این ایمیل قبلا در سامانه ثبت شده است"]);
        } else {
            return response(['msg_error' => '']);
        }
    }

    public function edit(Phone $phone)
    {
        if ($phone->phone_type == Company::class){
            $company = Company::query()->whereId($phone->phone_id)->first();
            $type='company';
            $title = $company->name;
        }else if($phone->phone_type == Person::class){
            $person = Person::query()->whereId($phone->phone_id)->first();
            $title = $person->firstName . '  ' . $person->lastName;
            $type='persons';
        }else{
            return abort(403);
        }

        return view('pages.common.phones.edit',[
            'phone'=>$phone,
            'item'=>$phone->phone_id,
            'type'=>$type,
            'title'=>$title
        ]);

    }

    public function update(UpdatePhoneRequest $request, Phone $phone)
    {
        $this->validate($request,
            ['value' => new UniqueOtherSelf('phones', 'value', $phone->id, " این شماره قبلا در سیستم ثبت شده است.")]
        );
        if ($phone->phone_type == Company::class){
            $company = Company::query()->whereId($phone->phone_id)->first();
            $type='company';
            $title = $company->name;
        }else if($phone->phone_type == Person::class){
            $person = Person::query()->whereId($phone->phone_id)->first();
            $title = $person->firstName . '  ' . $person->lastName;
            $type='persons';
        }else{
            return abort(403);
        }
        $phone->update([
            'value' => $request->get('value'),
        ]);

        return redirect(route('phone.show',[$type,$phone->phone_id]));
    }

    public function show($type, $data)
    {
        if ($type == 'company') {
            $company = Company::query()->whereId($data)->first();
            return view('pages.common.phones.show', [
                'type' => $type,
                'title' => $company->name,
                'item' => $company,
            ]);
        }
        if ($type == 'persons') {
            $person = Person::query()->whereId($data)->first();
            return view('pages.common.phones.show', [
                'type' => $type,
                'title' => $person->firstName . '  ' . $person->lastName,
                'item' => $person,
            ]);
        }
    }

    public function create($type, $item)
    {
        if ($type == 'company') {
            $company = Company::query()->whereId($item)->first();
            return view('pages.common.phones.create', [
                'type' => $type,
                'dataId' => $item,
                'title' => $company->name,
                'item' => $company,
            ]);
        }
        if ($type == 'persons') {
            $person = Person::query()->whereId($item)->first();
            return view('pages.common.phones.create', [
                'type' => $type,
                'dataId' => $item,
                'title' => $person->firstName . '  ' . $person->lastName,
                'item' => $person,
            ]);
        }
    }

    public function store(PhoneStoreRequest $request, $type, $data)
    {
        if ($type == 'company') {
            $phone_type = Company::class;
        }else if($type == 'persons') {
            $phone_type = Person::class;
        }else{
            return abort(404);
        }

        $phoneInsert = Phone::query()->create([
            'value' => $request->get('value'),
            'phone_type' => $phone_type,
            'phone_id' => $data,
        ]);

        return redirect(route('phone.show',[$type,$data]));
    }

    public function destroy(Phone $phone)
    {
        $phone->delete();
        return redirect()->back();
    }


}
