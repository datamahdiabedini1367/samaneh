<?php

namespace App\Http\Controllers;

use App\Models\Individual;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonRelatedController extends Controller
{

    public function index()
    {
    }

    public function create(Person $person)
    {

        return view('personRelated.create', [
            'person' => $person,
            'otherPerson' => Person::query()->where('id', '!=', $person->id)->get(),
            'individuals' => Individual::all(),
        ]);
    }

    public function store(Request $request, Person $person)
    {
        if ($request->hasAny('title')) {
            $individual = Individual::query()->create([
                'title' => $request->get('title'),
            ]);
            $individual_id = $individual->id;
        } else {
            $individual_id = $request->get('individual_id');
        }

        $attributes = [
            "individual_id" => $individual_id,
            "description" => $request->get('description'),
        ];

//        $person->relatedPerson()->attach($person->id, $attributes);
        $person->relatedPerson()->attach($request->get('person_id'),$attributes);

        return redirect(route('person.related.create', [
            'person' => $person,
            'otherPerson' => Person::query()->where('id', '!=', $person->id)->get(),
            'individuals' => Individual::all(),
        ]));


    }

    public function show(Person $person)
    {
        //
    }

    public function edit(Person $person)
    {
        //
    }

    public function update(Request $request, Person $person)
    {
        //
    }

    public function destroy(Person $person)
    {
        //
    }
}
