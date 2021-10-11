<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Models\Individual;
use App\Models\Permission;
use App\Models\Person;
use App\Models\PersonRelated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PersonRelatedController extends Controller
{
    public function show(Request $request, Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'list_related_persons')->first());

        return view('pages.persons.relatedPerson.show', [
            'person' => $person,
//            'otherPerson' => $otherPerson,
            'individuals' => Individual::all()->toArray(),
//            'fields' => $fields,
        ]);
    }

    public function create(Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_related_person')->first());

        $related_id = PersonRelated::query()->where('person_id', "=", $person->id)->pluck('related_id');
        $otherPerson = Person::query()->whereNotIn('id', $related_id)
            ->where('id', '!=', $person->id)
            ->get(['id', 'firstName', 'lastName', 'fatherName']);
        $arr = [];
        foreach ($otherPerson as $item) {
            if (empty($item->fatherName)) {
                $arr[] = [$item->id, $item->firstName . ' ' . $item->lastName];
            } else {
                $arr[] = [$item->id, $item->firstName . ' ' . $item->lastName . ' ' . 'فرزند' . ' ' . $item->fatherName];
            }
        }

        return view('pages.persons.relatedPerson.create', [
            'person' => $person,
            'otherPerson' => arrayTwoItem($arr),
            'individuals' => arrayTwoItem(Individual::all(['id', 'title'])->toArray()),
        ]);


    }

    public function store(Request $request, Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_related_person')->first());

        if ($request->hasAny('title')) {
            $individual = Individual::query()->create([
                'title' => $request->get('title'),
            ]);
            $individual_id = $individual->id;
        } else {
            $individual_id = $request->get('individual_id');
        }
//
//        $attributes = [
//            "individual_id" => $individual_id,
//            "description" => $request->get('description'),
//        ];
//        $person->relatedPerson()->attach($request->get('person_id'), $attributes);

        PersonRelated::query()->create([
            'person_id' => $person->id,
            'related_id' => $request->get('person_id'),
            'individual_id' => $individual_id,
            'description' => $request->get('description')
        ]);


        return redirect(route('persons.related.show', [
            'person' => $person,
        ]));


    }

    public function edit(Person $person, person $related)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_related_person')->first());
        $individual = PersonRelated::query()->where([
            ["person_id", $person->id],
            ["related_id", $related->id]
        ])->first();

        return view('pages.persons.relatedPerson.edit', [
            'relatedPerson' => $related,
            'person' => $person,
            'individuals' => arrayTwoItem(Individual::all(['id', 'title'])->toArray()),
            'personIndividualRelated' => $individual
        ]);
    }

    public function update(Request $request, Person $person, Person $related)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_related_person')->first());

        PersonRelated::query()
            ->where('person_id', $person->id)
            ->where('related_id', $related->id)
            ->update([
                "individual_id" => $request->get('individual_id'),
                "description" => $request->get('description'),
            ]);;

        session()->flash('success',"اطلاعات با موفقیت ویرایش شد. ");


//        $personRelated = DB::table('person_related')->where('person_id', $person->id)
//            ->where('related_id', $related->id)  ->update([
//                "individual_id" => $request->get('individual_id'),
//                "description" => $request->get('description'),
//            ]);

        return redirect(route('persons.related.show', $person));
    }

    public function destroy(Person $person, Person $related)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_related_person')->first());

        DB::table('person_related')->where('person_id', $person->id)->where('related_id', $related->id)->delete();
        session()->flash('success',"اطلاعات با موفقیت حذف شد. ");

//        PersonRelated::query()->where('person_id', $person->id)->where('related_id', $related->id)->delete();

        return redirect(route('persons.related.show', $person));
    }

    public function exportPersonRelated(Person $person)
    {
        $export = new ExportExcel(['person' => $person], "pages.persons.relatedPerson.exportPersonRelated");
        return Excel::download($export, 'RelatedPerson.xlsx');

    }
}
