<?php

namespace App\Http\Controllers;

use App\Models\Educational;
use App\Models\Person;
use Illuminate\Http\Request;

class EducationalController extends Controller
{

    public function index()
    {

    }


    public function create(Person $person)
    {
        return view('educational.create', [
            'person' => $person
        ]);
    }


    public function store(Request $request, Person $person)
    {
        $educational = Educational::query()->create([
            "person_id"=>$person->id,
            "grade" => $request->get('grade'),
            "major" => $request->get('major'),
            "universityName" => $request->get('universityName'),
            "average" => $request->get('average'),
            "startDate" => $request->get('startDate'),
            "endDate" => $request->get('endDate'),
            "address" => $request->get('address'),
        ]);

        return view('educational.create', [
            'person' => $person
        ]);
    }


    public function show(Educational $educational)
    {

    }


    public function edit(Educational $educational)
    {

    }


    public function update(Request $request, Educational $educational,Person $person)
    {
        $educational->update([
            "person_id"=>$person->id,
            "grade" => $request->get('grade'),
            "major" => $request->get('major'),
            "universityName" => $request->get('universityName'),
            "average" => $request->get('average'),
            "startDate" => $request->get('startDate'),
            "endDate" => $request->get('endDate'),
            "address" => $request->get('address'),
        ]);

        return view('educational.create', [
            'person' => $person
        ]);

    }


    public function destroy(Educational $educational,Person $person)
    {
        $educational->delete();
        return view('educational.create', [
            'person' => $person
        ]);

    }
}
