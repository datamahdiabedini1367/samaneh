<?php

namespace App\Http\Controllers;

use App\Models\Educational;
use App\Models\Permission;
use App\Models\Person;
use Illuminate\Http\Request;

class EducationalController extends Controller
{

    public function create(Person $person)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_educational')->first());

        return view('educational.create', [
            'person' => $person
        ]);
    }


    public function store(Request $request, Person $person)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_educational')->first());

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



    public function update(Request $request, Educational $educational,Person $person)
    {
        $this->authorize('isAccess',Permission::query()->where('title','edit_educational')->first());

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
        $this->authorize('isAccess',Permission::query()->where('title','delete_educational')->first());

        $educational->delete();
        return view('educational.create', [
            'person' => $person
        ]);

    }
}
