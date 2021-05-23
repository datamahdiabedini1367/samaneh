<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function assign(Project $project)
    {
        return view('project.projectUser.assign',[
            'project'=>$project,
            'users'=>User::all(),
        ]);
    }

    public function store(Project $project,User $user)
    {
//        dd('run store assign user');
        $isUserAssignBefore = $project->users()
                                      ->where('user_id',$user->id)
                                      ->exists();
        if ($isUserAssignBefore){
            $project->users()->detach($user);
        } else{
            $project->users()->attach($user);
        }
        return response(['count_user'=>$project->users()->count(),],200);
    }
}
