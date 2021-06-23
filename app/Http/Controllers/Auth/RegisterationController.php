<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterationRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterationController extends Controller
{
    public function create()
    {

        $this->authorize('isAccess',Permission::query()->where('title','create_user')->first());
//        dd(Role::all());
        return view('authentication.signup',[
            'roles'=>Role::all(),
        ]);
    }

    public function store(RegisterationRequest $request)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_user')->first());

//        dd($request->all(),$request->get('is_active',0));
        $user = User::query()->create([
            'username'=>$request->get('username'),
            'is_active'=>$request->get('is_active',0),
            'role_id'=>$request->get('role_id'),
            'password'=>bcrypt($request->get('password')),
        ]);

        return redirect(route('users.index'));
    }

    public function createShowLoginForm()
    {
        $this->middleware('guest');
        return view('authentication.login');

    }

    public function storeLogin(LoginRequest  $request)
    {
        $this->middleware('guest');

        $user= User::query()->where('username',$request->get('username'))->firstOrFail();

        if (!$user->is_active)
            abort(403);

        if (!Hash::check($request->get('password'),$user->password)){
            return back()->withErrors('کاربری با این اطلاعات یافت نشد');
        }

        auth()->login($user);

        return redirect('/');

    }

    public function logout()
    {
        $this->middleware('auth');
        auth()->logout();
        return redirect('/');
    }
}
