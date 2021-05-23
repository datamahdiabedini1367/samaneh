<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
//        $this->authorize('auth');
    }

    public function index()
    {
        $user = auth()->user();
        return view('users.myProjects', [
            'projects' => $user->projects()->get(),
        ]);
    }

    public function listUser()
    {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }


    public function changeActivation(User $user)
    {

        if ($user->is_active == 0) {
            $user_update = User::query()->where('id',$user->id)->update(['is_active' => 1]);

            return response(['msg' => 1], 200);
        } else if ($user->is_active == 1) {
            $user_update = User::query()->where('id',$user->id)->update(['is_active' => 0]);

            return response(['msg' => 0], 200);
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
