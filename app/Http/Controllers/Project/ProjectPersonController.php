<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Person;
use Illuminate\Http\Request;

class ProjectPersonController extends Controller
{
    public function assign(Project $project)
    {
        return view('project.projectPerson.assign',[
            'project'=>$project,
            'persons'=>Person::all(),
        ]);

    }

    public function store(Project $project,Person $person)
    {
        $isPersonAssignBefore = $project->persons()
                                      ->where('person_id',$person->id)
                                      ->exists();
        if ($isPersonAssignBefore){
            $project->persons()->detach( $person) ;
        }else{
            $project->persons()->attach($person);
        }
        return response(['count_person'=>$project->persons()->count(),],200);
    }
}
