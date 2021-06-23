<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Company;
use App\Models\Permission;
use App\Models\Person;
use App\Models\project;
use App\Models\User;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $this->authorize('isAccess',Permission::query()->where('title','list_projects')->first());

        return view('project.projects.index', [
            'projects' => Project::all(),
        ]);
    }


    public function create()
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_project')->first());

        return view('project.projects.create', [
//            'users' => User::all(),
//            'companies' => Company::all(),
//            'persons' => Person::all(),
        ]);
    }


    public function store(ProjectStoreRequest $request)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_project')->first());

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
        $this->authorize('isAccess',Permission::query()->where('title','edit_project')->first());

        return view('project.projects.edit', [
            'project' => $project,
//            'users' => User::all(),
//            'companies' => Company::all(),
//            'persons' => Person::all(),
        ]);
    }

    public function show(Project $project)
    {
        $this->authorize('isAccess',Permission::query()->where('title','show_detail_project')->first());

        return view('project.projects.show', [
            'project'=>$project,
        ]);
    }


    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $this->authorize('isAccess',Permission::query()->where('title','edit_project')->first());

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
        $this->authorize('isAccess',Permission::query()->where('title','delete_project')->first());

        $project->persons()->detach();
        $project->companies()->detach();
        $project->users()->detach();
        $project->delete();
        return redirect(route('projects.index'));
    }
}
