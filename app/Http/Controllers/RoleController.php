<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('isAccess',Permission::query()->where('title','list_roles')->first());

        return view('roles.index',[
            'roles'=>Role::all(),
        ]);
    }

    public function create()
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_role')->first());

        return view('roles.create',[
            'permissions'=>Permission::all(),
        ]);
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_role')->first());

//        dd($request->all());
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

        return view('roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::all(),
        ]);
    }

    public function update(RoleRequest $request,Role $role)
    {
        $this->authorize('isAccess',Permission::query()->where('title','edit_role')->first());

        $role->update([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
        ]);

        $role->permissions()->sync($request->get('permissions'));
        return redirect(route('roles.index'));
    }

    public function destroy(Role $role)
    {
        $this->authorize('isAccess',Permission::query()->where('title','delete_role')->first());

        $role->permissions()->detach();
        $role->delete();
        return redirect(route('roles.index'));
    }
}
