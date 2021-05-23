<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Company;
use App\Models\Person;
use App\Models\project;
use App\Models\User;

class ProjectController extends Controller
{

    public function index()
    {
        return view('projects.index', [
            'projects' => Project::all(),
        ]);
    }


    public function create()
    {
        return view('projects.create', [
//            'users' => User::all(),
//            'companies' => Company::all(),
//            'persons' => Person::all(),
        ]);
    }


    public function store(ProjectStoreRequest $request)
    {
        $project = Project::query()->create([
            'name' => $request->get('name'),
            'startDate' => $request->get('startDate'),
            'endDate' => $request->get('endDate'),
            'description' => $request->get('description'),
        ]);
//        $project->users()->attach($request->get('users'));
//        $project->companies()->attach($request->get('companies'));
//        $project->persons()->attach($request->get('persons'));

        return redirect(route('projects.index'));
    }


    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
//            'users' => User::all(),
//            'companies' => Company::all(),
//            'persons' => Person::all(),
        ]);
    }

    public function show(Project $project)
    {

        return view('projects.show', [
            'project'=>$project,
        ]);
    }


    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update([
            'name' => $request->get('name', $project->name),
            'startDate' => $request->get('startDate', $project->startDate),
            'endDate' => $request->get('endDate', $project->endDate),
            'description' => $request->get('description', $project->description),
        ]);

//        $project->users()->sync($request->get('users'));
//        $project->companies()->sync($request->get('companies'));
//        $project->persons()->sync($request->get('persons'));

        return redirect(route('projects.index'));

    }


    public function destroy(Project $project)
    {
        $project->persons()->detach();
        $project->companies()->detach();
        $project->users()->detach();
        $project->delete();
        return redirect(route('projects.index'));
    }
}
