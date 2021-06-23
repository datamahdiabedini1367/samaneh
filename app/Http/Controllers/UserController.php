<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function __construct()
    {
//        $this->middleware(CheckPermission::class);
//        $this->authorizeResource(User::class);
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'my_project')->first());

        $user = auth()->user();
        return view('users.myProjects', [
            'projects' => $user->projects()->get(),
        ]);
    }

    public function listUser()
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'list_users')->first());

        return view('users.index', [
            'users' => User::all(),
            'roles' => Role::all(),
        ]);
    }


    public function changeActivation(User $user)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'active_user')->first());

        if ($user->is_active == 0) {
            $user_update = User::query()->where('id', $user->id)->update(['is_active' => 1]);

            return response(['msg' => 1], 200);
        } else if ($user->is_active == 1) {
            $user_update = User::query()->where('id', $user->id)->update(['is_active' => 0]);

            return response(['msg' => 0], 200);
        }
    }


    public function changeRole(User $user, Role $role)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'change_role')->first());

        $user->update([
            'role_id' => $role->id,
        ]);

        return response(['msg' => 'ok'], 200);

    }

    public function myproject()
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'my_project')->first());

        $user = auth()->user();

        return view('users.myproject', [
            'projects' => $user->projects,
        ]);
    }


    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }


    public function update(ChangePasswordRequest $request, User $user)
    {
        if (auth()->user()->id != User::query()->where('username', $request->get('username'))->first()->id) {
            abort(403);
        }
        if (!Hash::check($request->get('password-old'), $user->password)) {
            return back()->withErrors('رمز عبور قبلی اشتباه وارد شده است');
        }
        $user->update([
            'password'=> bcrypt($request->get('password')),
        ]);
        return redirect(route('index'));
    }


    public function destroy(User $user)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_user')->first());
        $user->projects()->detach();

        $user->delete();
        return redirect(route('users.index'));
    }
}
