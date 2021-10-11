<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

//use Maatwebsite\Excel\Excel;

class UserController extends Controller
{
    use FormAccessible;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function export(Request $request)
    {
        $field = session()->get('field');
        $phrase = session()->get('phrase');

        if (session()->has('field') && $field == 'username') {
            $users = User::query()->where('username', 'like', "%{$phrase}%")
                ->orderBy('id')->get();
        } else {
            $users = User::all();
        }

        $export = new ExportExcel(['users' => $users], "pages.users.exports");
        return Excel::download($export, 'users.xlsx');
    }

    //for my projects
    public function index(Request $request)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'my_project')->first());

        $user = auth()->user();
        return view('pages.projects.users.myProject', [
            'projects' => $user->projects()->get(),
        ]);
    }

    public function listUser(Request $request)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'list_users')->first());

        $field = $request->get('field');
        $phrase = $request->get('phrase');
        session()->put('field', $field);
        session()->put('phrase', $phrase);

        if ($request->has('field') && $field == 'username') {
            $users = User::query()->where('username', 'like', "%{$phrase}%")->where('id', '!=', 1) // for admin
            ->orderBy('id')->paginate();
        } else {
            $users = User::query()->where('id', '!=', 1)->paginate();
        }


        $role = Role::all(['id', 'title'])->toArray();

        return view('pages.users.index', [
            'users' => $users,
            'roles' => arrayTwoItem($role),
            'fields' => ['username' => "نام کاربری"]
        ]);
    }

    public function changeActivation(Request $request, User $user)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'active_user')->first());

        if ($user->is_active == 0) {
            User::withoutEvents(function () use ($user) {
                $user->update(['is_active' => 1]);
            });
            return response(['msg' => 1], 200);
        } else if ($user->is_active == 1) {
            User::withoutEvents(function () use ($user) {
                $user->update(['is_active' => 0]);
            });
            return response(['msg' => 0], 200);
        }
    }

    public function changeRole(Request $request,User $user)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'change_role')->first());
        User::withoutEvents(function () use ($user, $request) {
            if ($request->get('role_id') == '0') {
                $user->update(['role_id' => null]);
            }else{
                $user->update(['role_id' => $request->get('role_id')]);
            }

        });

        return response(['msg' => 'ok'], 200);
    }

    public function myproject(Request $request)
    {
        $user = auth()->user();

        $this->authorize('isAccess', Permission::query()->where('title', 'my_project')->first());

        $field = $request->get('field');
        $phrase = $request->get('phrase');

        if ($request->has('field') && $field == 'all') {
            $projects = $user->projects()->where('name', 'like', "%{$phrase}%")
                ->orWhere('description', 'like', "%{$phrase}%")
                ->orderBy('id')->paginate();
        } else if ($request->has('field') && $field == 'startDate') {
            $phrase = convert_date($phrase, 'gregorian');
            $projects = $user->projects()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else if ($request->has('field') && $field == 'endDate') {
            $phrase = convert_date($phrase, 'gregorian');
            $projects = $user->projects()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else if ($request->has('field') && !empty($field) && !empty($phrase)) {
            $projects = $user->projects()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else {
            $projects = $user->projects()->paginate();
        }

        $fields = [
            'name' => 'نام پروژه',
            'startDate' => 'تاریخ شروع پروژه',
            'endDate' => 'تاریخ اتمام پروژه',
            'description' => 'توضیحات',
            'all' => 'همه موارد'
        ];


        return view('pages.projects.users.myProject', [
            'projects' => $projects,
            'fields' => $fields,
        ]);
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', [
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
            'password' => bcrypt($request->get('password')),
        ]);
        return redirect(route('index'));
    }

    public function destroy(User $user)
    {
        $this->authorize('isAccess', Permission::query()->where('title', 'delete_user')->first());
        $user->projects()->detach();

        $user->delete();
        return redirect(route('users.listUsers'));
    }


}
