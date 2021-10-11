<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Http\Requests\EducationalStoreRequest;
use App\Http\Requests\EducationalUpdateRequest;
use App\Models\Educational;
use App\Models\Permission;
use App\Models\Person;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EducationalController extends Controller
{
    public function show(Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_educational')->first());

        return view('pages.persons.educational.show', [
            'person' => $person
        ]);
    }

    public function create(Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_educational')->first());

        return view('pages.persons.educational.create', [
            'person' => $person
        ]);
    }

    public function store(EducationalStoreRequest $request, Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_educational')->first());

        Educational::query()->create([
            "person_id" => $person->id,
            "grade" => $request->get('grade'),
            "major" => $request->get('major'),
            "universityName" => $request->get('universityName'),
            "average" => $request->get('average'),
            "startDate" => $request->get('startDate'),
            "endDate" => $request->get('endDate'),
            "address" => $request->get('address'),
        ]);

        return redirect(route('educational.show', ['person' => $person]) );
    }

    public function edit(Educational $educational)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_educational')->first());

        return view('pages.persons.educational.edit', [
            'educational' => $educational
        ]);
    }

    public function update(EducationalUpdateRequest $request, Educational $educational)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_educational')->first());

        $educational->update([
//            "person_id" => $persons->id,
            "grade" => $request->get('grade'),
            "major" => $request->get('major'),
            "universityName" => $request->get('universityName'),
            "average" => $request->get('average'),
            "startDate" => convert_date($request->get('startDate'), 'gregorian'),
            "endDate" => convert_date($request->get('endDate'), 'gregorian'),
            "address" => $request->get('address'),
        ]);

        return redirect( route('educational.show', ['person' => $educational->person_id]) );

    }

    public function destroy(Educational $educational)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_educational')->first());

        $educational->delete();
        return redirect(route('educational.show',['person' => $educational->person_id]));
    }

    public function exportPersonEducational(Person $person)
    {
        $export = new ExportExcel(['person' => $person], "pages.persons.educational.exportEducational");
        return Excel::download($export, 'educational.xlsx');
    }
}
