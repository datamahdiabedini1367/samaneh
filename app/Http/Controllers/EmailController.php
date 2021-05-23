<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailStoreRequest;
use App\Models\Company;
use App\Models\Email;
use App\Models\Person;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function check(Request $request, $itemId)
    {
        $emailIsUsed = Email::query()
            ->where('value', $request->get('email'))
            ->where('email_id', '!=', $itemId)
            ->exists();

        if ($emailIsUsed) {
            return response([
                'msg_error' => "این ایمیل قبلا در سامانه ثبت شده است",
            ], 200);
        } else {
            return response(['msg_error' => ''], 200);
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


    public function store(EmailStoreRequest $request)
    {
        $email_type = $request->get('emailType') == 'company' ? Company::class : Person::class;
        $email_id = $request->get('emailId');
        $emailInsert = Email::query()->create([
            'value' => $request->get('value'),
            'email_type' => $email_type,
            'email_id' => $email_id,
        ]);
        if ($emailInsert) {
            return response([
                'count' => Email::query()->where('email_id', $email_id)->where('email_type', $email_type)->count(),
                'emailInsert' => $emailInsert,
            ], 200);
        } else {
            return response([
                'error' => 'این ایمیل قبلا ثبت شده است',
            ], 403);
        }
    }


    public function show(Email $email)
    {
        //
    }


    public function edit(Email $email)
    {
        //
    }


    public function update(Request $request, Email $email)
    {

//        dd($request->all(),$email);
        $isAvailable = Email::query()->where('email_id', '!=', $request->get('dataId'))
            ->where('value', $request->get('value'))->exists();

        $isAvailableForThisItem = Email::query()
                                        ->where('email_id', $request->get('dataId'))
                                        ->where('value', $request->get('value'))
                                        ->where('email_type', $email->email_type)
                                        ->exists();
        $output=$email->value;
        $msg='';

        if ($isAvailable) {
            $msg ='این ایمیل تکراری است.';
        } elseif ($email->value == $request->get('value')) {
                $msg = 'این همان ایمیل قبلی است ایمیل جدید را وارد کنید.';
        } else if($isAvailableForThisItem){
                $msg = 'این ایمیل قبلا در همین جدول ذخیره شده و نمی شه یک ایمیل را دوبار در جدول ذخیره کرد';
        }else{
            $email->update([
                'value' => $request->get('value'),
            ]);
            $output=$email->value;
        }


        return response([
            'value' => $output,
            'msg'=>$msg
        ], 200);

    }


    public function destroy(Email $email)
    {
        $email->delete();
        return response([
            'msg'=>"حذف با موفقیت انجام شد",
        ],200);
    }

}
