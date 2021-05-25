<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonStoreRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index()
    {
        return view('persons.index', [
            'persons' => Person::all(),
        ]);
    }


    public function create()
    {
        return view('persons.create');

    }


    public function store(PersonStoreRequest $request)
    {
        $person =Person::query()->create([
            'firstName'=>$request->get('firstName'),
            'nikeName'=>$request->get('nikeName'),
            'lastName'=>$request->get('lastName'),
            'fatherName'=>$request->get('fatherName'),
            'motherName'=>$request->get('motherName'),
            'married'=>$request->get('married'),
            'birthdate'=>$request->get('birthdate'),
            'birthdatePlace'=>$request->get('birthdatePlace'),
            'gender'=>$request->get('gender'),
            'nationalCode'=>$request->get('nationalCode'),
            'address'=>$request->get('address'),
            'bio'=>$request->get('bio'),
            'entertainments'=>$request->get('entertainments'),
            'personalFavorites'=>$request->get('personalFavorites'),
            'politicalOrientation'=>$request->get('politicalOrientation'),
            'languageUse'=>$request->get('languageUse'),
        ]);

        return redirect(route('contact.create', ['type' => 'person', 'data' => $person]));


    }


    public function show(Person $person)
    {

    }


    public function edit(Person $person)
    {
        return view('persons.edit',[
            'person'=>$person
        ]);
    }


    public function update(PersonUpdateRequest $request, Person $person)
    {
        $person->update([
            'firstName'=>$request->get('firstName', $person->firstName),
            'nikeName'=>$request->get('nikeName', $person->nikeName),
            'lastName'=>$request->get('lastName', $person->lastName),
            'fatherName'=>$request->get('fatherName', $person->fatherName),
            'motherName'=>$request->get('motherName', $person->motherName),
            'married'=>$request->get('married', $person->married),
            'birthdate'=>$request->get('birthdate', $person->birthdate),
            'birthdatePlace'=>$request->get('birthdatePlace', $person->birthdatePlace),
            'gender'=>$request->get('gender', $person->gender),
            'nationalCode'=>$request->get('nationalCode', $person->nationalCode),
            'address'=>$request->get('address', $person->address),
            'bio'=>$request->get('bio', $person->bio),
            'entertainments'=>$request->get('entertainments', $person->entertainments),
            'personalFavorites'=>$request->get('personalFavorites', $person->personalFavorites),
            'politicalOrientation'=>$request->get('politicalOrientation', $person->politicalOrientation),
            'languageUse'=>$request->get('languageUse', $person->languageUse),
        ]);

        return redirect(route('contact.create', ['type' => 'person', 'data' => $person]));
    }


    public function destroy(Person $person)
    {

        $person->delete();
        return redirect(route('persons.index'));


    }
}
