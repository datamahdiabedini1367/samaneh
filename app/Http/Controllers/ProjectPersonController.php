<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Person;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectPersonController extends Controller
{
    public function assign(Request $request,Project $project)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_person_project')->first());

        $field = $request->get('field');
        $phrase = $request->get('phrase');
        session()->put('field', $field);
        session()->put('phrase', $phrase);


        if ($request->has('field') && $field == 'all') {
            $persons = Person::query()->where('firstName', 'like', "%{$phrase}%")
                ->orWhere('nikeName', 'like', "%{$phrase}%")
                ->orWhere('lastName', 'like', "%{$phrase}%")
                ->orWhere('fatherName', 'like', "%{$phrase}%")
                ->orWhere('motherName', 'like', "%{$phrase}%")
                ->orWhere('birthdatePlace', 'like', "%{$phrase}%")
                ->orWhere('nationalCode', 'like', "%{$phrase}%")
                ->orWhere('address', 'like', "%{$phrase}%")
                ->orWhere('bio', 'like', "%{$phrase}%")
                ->orWhere('entertainments', 'like', "%{$phrase}%")
                ->orWhere('personalFavorites', 'like', "%{$phrase}%")
                ->orWhere('politicalOrientation', 'like', "%{$phrase}%")
                ->orWhere('languageUse', 'like', "%{$phrase}%")
                ->orderBy('id')->paginate();
//            ->where('birthdate', 'like', "%{$phrase}%")

        } else if ($request->has('field') && $field == 'birthdate') {
            $phrase = convert_date($phrase, 'gregorian');
            $persons = Person::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else if ($request->has('field') && !empty($field) && !empty($phrase)) {
            $persons = Person::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else {
            $persons = Person::query()->paginate();
        }

        $fields = [
            'firstName' => 'نام',
            'nikeName' => 'نام مستعار',
            'lastName' => 'نام خانوادگی',
            'fatherName' => 'نام پدر',
            'motherName' => 'نام مادر',
            'birthdate' => 'تاریخ تولد',
            'birthdatePlace' => 'مکان تولد',
            'nationalCode' => 'کد ملی',
            'address' => 'آدرس',
            'bio' => 'بیوگرافی',
            'entertainments' => 'سرگرمی ها',
            'personalFavorites' => 'علایق شخصی',
            'politicalOrientation' => 'گرایش سیاسی',
            'languageUse' => 'زبانهای مورد استفاده',
            'all' => 'همه موارد'
        ];

        return view('pages.projects.persons.assign', [
            'project' => $project,
            'persons' => $persons,
            'fields'=>$fields
        ]);

    }

    public function store(Project $project, Person $person)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_person_project')->first());
        $this->attachDettachPersonProject($project, $person);
        return response(['count_person' => $project->persons()->count(),], 200);
    }

    public function storePersonProject(Person $person, Project $project)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_person_project')->first());

        $this->attachDettachPersonProject($project, $person);
        return response(['count_project' => $person->projects()->count(),], 200);
    }

    private function attachDettachPersonProject(Project $project, Person $person)
    {
        $isPersonAssignBefore = $project->persons()
            ->where('person_id', $person->id)
            ->exists();
        if ($isPersonAssignBefore) {
            $project->persons()->detach($person);
        } else {
            $project->persons()->attach($person);
        }
    }


}
