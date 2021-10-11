<?php

namespace App\Observers;

use App\Models\Account;

class AccountObserver
{
    /**
     * Handle the Account "created" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function created(Account $account)
    {
        session()->flash('success',"اطلاعات  با موفقیت ثبت شد. ");

    }

    /**
     * Handle the Account "updated" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function updated(Account $account)
    {
        session()->flash('success',"اطلاعات  با موفقیت ویرایش شد. ");

    }

    /**
     * Handle the Account "deleted" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function deleted(Account $account)
    {
        session()->flash('success',"اطلاعات  با موفقیت حذف شد. ");

    }

}
