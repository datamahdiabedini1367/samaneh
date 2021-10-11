<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterationRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class RegisterationController extends Controller
{
    public function create()
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_user')->first());

        return view('pages.users.authentication.signup',[
            'roles'=>arrayTwoItem(Role::all(['id','title'])->toArray()),
        ]);
    }


    public function store(RegisterationRequest $request)
    {
        $this->authorize('isAccess',Permission::query()->where('title','create_user')->first());

        User::query()->create([
            'username'=>$request->get('username'),
            'is_active'=>$request->get('is_active',0),
            'role_id'=>$request->get('role_id'),
            'password'=>bcrypt($request->get('password')),
        ]);
        return redirect(route('users.listUsers'));
    }

    public function createShowLoginForm()
    {
        $this->middleware('guest');
        return view('pages.users.authentication.login');

    }

    public function storeLogin(LoginRequest  $request)
    {
        $this->middleware('guest');

        $user= User::query()->where('username',$request->get('username'))->firstOrFail();

        if (!$user->is_active)
            abort(403);
//        dd(!$user->is_active,!Hash::check($request->get('password'),$user->password) , $request->get('password') );
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
