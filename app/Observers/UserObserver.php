<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        session()->flash('success',"اطلاعات کاربر {$user->username} با موفقیت ثبت شد. ");

    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        session()->flash('success',"اطلاعات کاربر {$user->username} با موفقیت ویرایش شد. ");

    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        session()->flash('success',"اطلاعات کاربر {$user->username} با موفقیت حذف شد. ");
    }


}
