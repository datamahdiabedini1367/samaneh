<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function assign(Request $request,Project $project)
    {
        $this->authorize('isAccess',Permission::query()->where('title','assign_user_to_project')->first());

        $request->validate([
            'username'=>['string','nullable'],
        ]);

        $field = $request->get('field');
        $phrase = $request->get('phrase');


       if($request->has('field') && !empty($phrase)){
           $users = User::query()->where($field,'like',"%{$phrase}%")->orderBy('id')->paginate();
        } else{
           $users = User::query()->paginate();
        }

        $fields=['username'=>'نام کاربری'];

        return view('pages.projects.users.assign',[
            'project'=>$project,
            'users'=>$users,
            'fields'=>$fields
        ]);
    }

    public function store(Project $project,User $user)
    {
        $this->authorize('isAccess',Permission::query()->where('title','assign_user_to_project')->first());

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
