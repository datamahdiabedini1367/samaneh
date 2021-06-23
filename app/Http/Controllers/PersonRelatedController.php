<?php

namespace App\Http\Controllers;

use App\Models\Individual;
use App\Models\Permission;
use App\Models\Person;
use App\Models\PersonRelated;
use Illuminate\Http\Request;

class PersonRelatedController extends Controller
{

    public function index()
    {
    }

    public function create(Person $person)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_related_person')->first());


        $related_id = PersonRelated::query()->where('person_id',"=",$person->id)->pluck('related_id');
        $otherPerson = Person::query()->where('id', '!=', $person->id)
                                        ->whereNotIn('id',$related_id)
                                        ->get();
//        dd($otherPerson);
        return view('personRelated.create', [
            'person' => $person,
            'otherPerson' => $otherPerson,
            'individuals' => Individual::all(),
        ]);
    }

    public function store(Request $request, Person $person)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_related_person')->first());

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

    public function update(Request $request, Person $person,Person $related)
    {
        $this->authorize('isAccess',Permission::query()->where('title','edit_related_person')->first());

//        dd('run update person related' , $request->all(),$person->id,$related->id);
        PersonRelated::query()
            ->where('person_id',$person->id)
            ->where('related_id',$related->id)->update([
                "individual_id" =>$request->get('individual'),
                "description" =>$request->get('description'),
            ]);

        return redirect(route('person.related.create',$person));
    }

    public function destroy(Person $person,Person $related)
    {
        $this->authorize('isAccess',Permission::query()->where('title','delete_related_person')->first());

        PersonRelated::query()->where('person_id',$person->id)->where('related_id',$related->id)->delete();
        return redirect(route('person.related.create',$person));
    }
}
