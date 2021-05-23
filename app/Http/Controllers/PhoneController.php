<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneStoreRequest;
use App\Models\Company;
use App\Models\Person;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function check(Request $request,$itemId)
    {
//        dd($request->all());
        $phoneIsUsed = Phone::query()
            ->where('value',$request->get('phone'))
            ->where('phone_id','!=',$itemId)
            ->exists();

        if ($phoneIsUsed){
            return response([
                'msg_error'=>"این شماره تماس قبلا در سامانه ثبت شده است",
            ],200);
        }else{
            return response(['msg_error'=>''],200);
        }
    }

    public function index()
    {
        //
    }


    public function create()
    {
        $company = new Company();
        return view('contactBook.contact', [
            'type' => 'company',
        ]);
    }


    public function store(PhoneStoreRequest $request)
    {
        $phone_type = $request->get('phoneType') == 'company' ? Company::class : Person::class;
        $phone_id = $request->get('phoneId');
        $phoneInsert = Phone::query()->create([
            'value' => $request->get('value'),
            'phone_type' => $phone_type,
            'phone_id' => $phone_id,
        ]);
        if ($phoneInsert) {
            return response([
                'count' => Phone::query()->where('phone_id', $phone_id)->where('phone_type', $phone_type)->count(),
                'phoneInsert' => $phoneInsert,
            ], 200);
        } else {
            return response([
                'error' => 'این شماره تماس قبلا ثبت شده است',
            ], 403);
        }
    }


    public function show(Phone $phone)
    {
        //
    }

    public function edit(Phone $phone)
    {
        //
    }


    public function update(Request $request, Phone $phone)
    {

        $isAvailable = Phone::query()->where('phone_id', '!=', $request->get('dataId'))
            ->where('value', $request->get('value'))->exists();

        $isAvailableForThisItem = Phone::query()
            ->where('phone_id', $request->get('dataId'))
            ->where('value', $request->get('value'))
            ->where('phone_type', $phone->phone_type)
            ->exists();
        $output=$phone->value;
        $msg='';

        if ($isAvailable) {
            $msg ='این شماره تماس تکراری است.';
        } elseif ($phone->value == $request->get('value')) {
            $msg = 'این همان شماره تماس قبلی است شماره تماس جدید را وارد کنید.';
        } else if($isAvailableForThisItem){
            $msg = 'این شماره تماس قبلا در همین جدول ذخیره شده و نمی شه یک شماره تماس را دوبار در جدول ذخیره کرد';
        }else{
            $phone->update([
                'value' => $request->get('value'),
            ]);
            $output=$phone->value;
        }


        return response([
            'value' => $output,
            'msg'=>$msg
        ], 200);

    }


    public function destroy(Phone $phone)
    {
        $phone->delete();
        return response([
            'msg'=>"حذف با موفقیت انجام شد",
        ],200);
    }
}
