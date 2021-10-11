<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Rules\UniqueOtherSelf;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('isAccess',Permission::query()->where('title','list_roles')->first());

        $field = $request->get('field');
        $phrase = $request->get('phrase');

        if ($request->has('field') && $field == 'all') {
            $roles = Role::query()->where('title', 'like', "%{$phrase}%")
                ->where('id','!=', 1)
                ->orWhere('description', 'like', "%{$phrase}%")
                ->orderBy('id')->paginate();
        } else if ($request->has('field') && !empty($field) && !empty($phrase)) {
            $roles = Role::query()->where($field, 'like', "%{$phrase}%")
                ->where('id','!=', 1)
                ->orderBy('id')->paginate();
        } else {
            $roles = Role::query()->where('id','!=', 1)->paginate();
        }

        $fields = [
            'title'=>'عنوان نقش',
            'description'=>'توضیحات',
            'all'=>'همه موارد',
        ];

        return view('pages.users.roles.index',[
            'roles'=>$roles,
            'fields'=>$fields
        ]);
    }

    public function create()
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_role')->first());

        return view('pages.users.roles.create',[
            'permissions'=>Permission::all(),
        ]);
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_role')->first());

        $role = Role::query()->create([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
        ]);
        $role->permissions()->attach($request->get('permissions'));
        return redirect(route('roles.index'));
    }

    public function edit(Role $role)
    {
        $this->authorize('isAccess',Permission::query()->where('title','edit_role')->first());

        if ($role->id != 1 && $role->title != 'admin') {
            return view('pages.users.roles.edit', [
                'role' => $role,
                'permissions' => Permission::all(),
            ]);
        }
        return redirect(route('roles.index'));
    }

    public function update(UpdateRoleRequest  $request,Role $role)
    {
        $this->authorize('isAccess',Permission::query()->where('title','edit_role')->first());

        $this->validate($request,
            ['title' =>new UniqueOtherSelf('roles','title',$role->id,"عنوان نقش تکراری است لطفا عنوان دیگری وارد کنید.")]
        );

        if ($role->id != 1 && $role->title != 'admin') {
            $role->update([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
            ]);
        }

        $role->permissions()->sync($request->get('permissions'));
        return redirect(route('roles.index'));
    }

    public function destroy(Role $role)
    {
        $this->authorize('isAccess',Permission::query()->where('title','delete_role')->first());

        if ($role->id != 1 && $role->title != 'admin') {

            $role->permissions()->detach();
            $role->delete();

        }

        return redirect(route('roles.index'));
    }
}
