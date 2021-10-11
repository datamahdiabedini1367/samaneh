<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailStoreRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Models\Company;
use App\Models\Email;
use App\Models\Person;
use App\Rules\UniqueOtherSelf;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function update(UpdateEmailRequest $request, Email $email)
    {
        $this->validate($request,
            ['value' => new UniqueOtherSelf('emails', 'value', $email->id, " این ایمیل قبلا در سیستم ثبت شده است.")]
        );
        if ($email->email_type == Company::class){
            $company = Company::query()->whereId($email->email_id)->first();
            $type='company';
            $title = $company->name;
        }else if($email->email_type == Person::class){
            $person = Person::query()->whereId($email->email_id)->first();
            $title = $person->firstName . '  ' . $person->lastName;
            $type='persons';
        }else{
            return abort(403);
        }
            $email->update([
                'value' => $request->get('value'),
            ]);

        return redirect(route('email.show',[$type,$email->email_id]));
    }

    public function edit(Email $email)
    {
        if ($email->email_type == Company::class){
            $company = Company::query()->whereId($email->email_id)->first();
            $type='company';
            $title = $company->name;
        }else if($email->email_type == Person::class){
            $person = Person::query()->whereId($email->email_id)->first();
            $title = $person->firstName . '  ' . $person->lastName;
            $type='persons';
        }else{
            return abort(403);
        }

        return view('pages.common.emails.edit',[
            'email'=>$email,
            'item'=>$email->email_id,
            'type'=>$type,
            'title'=>$title
            ]);

    }

    public function show($type, $data)
    {
        if ($type == 'company') {
            $company = Company::query()->whereId($data)->first();
            return view('pages.common.emails.show', [
                'type' => $type,
                'title' => $company->name,
                'item' => $company,
            ]);
        }
        if ($type == 'persons') {
            $person = Person::query()->whereId($data)->first();
            return view('pages.common.emails.show', [
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
            return view('pages.common.emails.create', [
                'type' => $type,
                'dataId' => $item,
                'title' => $company->name,
                'item' => $company,
            ]);
        }
        if ($type == 'persons') {
            $person = Person::query()->whereId($item)->first();
            return view('pages.common.emails.create', [
                'type' => $type,
                'dataId' => $item,
                'title' => $person->firstName . '  ' . $person->lastName,
                'item' => $person,
            ]);
        }
    }

    public function store(EmailStoreRequest $request, $type, $data)
    {
//        dd($request->all(), $type, $data);
        if ($type == 'company') {
            $email_type = Company::class;
        }else if($type == 'persons') {
            $email_type = Person::class;
        }else{
            return abort(404);
        }

//        $email_id = $request->get('emailId');
        $emailInsert = Email::query()->create([
            'value' => $request->get('value'),
            'email_type' => $email_type,
            'email_id' => $data,
        ]);

        return redirect(route('email.show',[$type,$data]));

//        if ($emailInsert) {
//            return response([
//                'count' => Email::query()->where('email_id', $email_id)->where('email_type', $email_type)->count(),
//                'emailInsert' => $emailInsert,
//            ]);
//        } else {
//            return response([
//                'error' => 'این ایمیل قبلا ثبت شده است',
//            ], 403);
//        }

    }

    public function destroy(Email $email)
    {
        $email->delete();
        return redirect()->back();
    }


}
