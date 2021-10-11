<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Permission;
use App\Models\project;
use App\Rules\UniqueOtherSelf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy(Project $project)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_project')->first());

        $project->persons()->detach();
        $project->companies()->detach();
        $project->users()->detach();
        $project->delete();
        return redirect(route('projects.index'));
    }

    public function index(Request $request)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'list_projects')->first());

        $field = $request->get('field');
        $phrase = $request->get('phrase');
        session()->put('field', $field);
        session()->put('phrase', $phrase);

        if ($request->has('field') && $field == 'all') {
            $projects = Project::query()->where('name', 'like', "%{$phrase}%")
                ->orWhere('description', 'like', "%{$phrase}%")
                ->orderBy('id')->paginate();

        } else if ($request->has('field') && $field == 'startDate') {
            $phrase = convert_date($phrase, 'gregorian');
            $projects = Project::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else if ($request->has('field') && $field == 'endDate') {
            $phrase = convert_date($phrase, 'gregorian');
            $projects = Project::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else if ($request->has('field') && !empty($field) && !empty($phrase)) {
            $projects = Project::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else {
            $projects = Project::query()->paginate();
        }

        return view('pages.projects.index', [
            'projects' => $projects,
            'fields' => [
                'name' => 'نام پروژه',
                'startDate' => 'تاریخ شروع پروژه',
                'endDate' => 'تاریخ پایان پروژه',
                'description' => 'توضیحات',
                'all' => 'همه موارد'
            ]
        ]);

    }

    public function create()
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_project')->first());

        return view('pages.projects.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'create_project')->first());
        if (!empty($request->startDate)) {
            $request->startDate = convert_date($request->startDate, 'gregorian');
        }
        if (!empty($this->endDate)) {
            $request->endDate = convert_date($this->endDate, 'gregorian');
        }

         Project::query()->create([
            'name' => $request->get('name'),
            'startDate' => $request->get('startDate'),
            'endDate' => $request->get('endDate'),
            'description' => $request->get('description'),
        ]);
        return redirect(route('projects.index'));
    }

    public function edit(Project $project)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_project')->first());

        return view('pages.projects.edit', [
            'project' => $project,
        ]);
    }

    public function show(Project $project)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'show_detail_project')->first());

        return view('pages.projects.show', [
            'project' => $project,
        ]);
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {

        $this->validate($request,
            ['name' =>new UniqueOtherSelf('projects','name',$project->id,"نام پروژه قبلا در سیستم ذخیره شده و تکراری است نام دیگری برای پروژه انتخاب کنید.")]
        );
        $this->authorize('isAccess', Permission::query()->where('title', 'edit_project')->first());

        $project->update([
            'name' => $request->get('name', $project->name),
            'startDate' => $request->get('startDate', $project->startDate),
            'endDate' => $request->get('endDate', $project->endDate),
            'description' => $request->get('description', $project->description),
        ]);

        return redirect(route('projects.index'));
    }



    public function export(Request $request)
    {
        $field = session()->get('field');
        $phrase = session()->get('phrase');

        if (session()->has('field') && $field == 'all') {
            $projects = Project::query()->where('name', 'like', "%{$phrase}%")
                ->orWhere('description', 'like', "%{$phrase}%")
                ->orderBy('id')->get();

        } else if (session()->has('field') && $field == 'startDate') {
            $phrase = convert_date($phrase, 'gregorian');
            $projects = Project::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->get();
        } else if (session()->has('field') && $field == 'endDate') {
            $phrase = convert_date($phrase, 'gregorian');
            $projects = Project::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->get();
        } else if (session()->has('field') && !empty($field) && !empty($phrase)) {
            $projects = Project::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->get();
        } else {
            $projects = Project::query()->get();
        }

        $export = new ExportExcel(['projects' => $projects], "pages.projects.exports");
        return Excel::download($export, 'projects.xlsx');
    }

    public function exportOne(Project $project)
    {
        $export = new ExportExcel(['project' => $project], "pages.projects.exportOne");
        return Excel::download($export, 'project.xlsx');
    }
}
