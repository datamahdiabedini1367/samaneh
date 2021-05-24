<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
    }


    public function create($type,$data)
    {
        if ($type=='company'){
            $company=Company::query()->whereId($data)->first();
            return view('contactBook.create',[
                'type'=>$type,
                'dataId'=>$data,
                'title'=>$company->name,
                'item'=> $company,
                ]);
        }
        if ($type=='person'){
            $person=Person::query()->whereId($data)->first();
            return view('contactBook.create',[
                'type'=>$type,
                'dataId'=>$data,
                'title'=>$person->firstName .'  '. $person->lastName,
                'item'=>$person,
            ]);

        }

    }



    public function update($type,$data)
    {
        if ($type=='company'){
            $company=Company::query()->whereId($data)->first();
            return view('contactBook.edit',['type'=>$type,'dataId'=>$data,'title'=>$company->name,'data'=>$company]);
        }
        if ($type=='person'){
            $person=Person::query()->whereId($data)->first();
            return view('contactBook.edit',[
                'type'=>$type,
                'dataId'=>$data,
                'title'=>$person->firstName .'  '. $person->lastName,
                'data'=>$person
                ]);

        }
    }


}
