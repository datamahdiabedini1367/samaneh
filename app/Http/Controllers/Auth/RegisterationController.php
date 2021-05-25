<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterationController extends Controller
{
    public function create()
    {
        return view('authentication.signup');
    }

    public function store(RegisterationRequest $request)
    {
//        dd($request->all(),$request->get('is_active',0));
        $user = User::query()->create([
            'username'=>$request->get('username'),
            'is_active'=>$request->get('is_active',0),
            'password'=>bcrypt($request->get('password')),
        ]);

        return redirect(route('index'));
    }

    public function createShowLoginForm()
    {
        return view('authentication.login');

    }

    public function storeLogin(LoginRequest  $request)
    {
        $user= User::query()->where('username',$request->get('username'))->firstOrFail();
//        dd($request->all(),$user);

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
        auth()->logout();
        return redirect('/');
    }
}
