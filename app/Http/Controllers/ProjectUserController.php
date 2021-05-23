<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectUserAssign;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function assign(Project $project)
    {
        return view('projectUser.assign',[
            'project'=>$project,
            'users'=>User::all(),
        ]);
    }

    public function store(ProjectUserAssign $request,Project $project)
    {
        dd($request->all());
        $project->users()->sync($http_response_header);
    }
}
