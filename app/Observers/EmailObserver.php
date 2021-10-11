<?php

namespace App\Observers;

use App\Models\Email;

class EmailObserver
{
    /**
     * Handle the Email "created" event.
     *
     * @param  \App\Models\Email  $email
     * @return void
     */
    public function created(Email $email)
    {
        session()->flash('success',"اطلاعات با موفقیت ثبت شد. ");

    }

    /**
     * Handle the Email "updated" event.
     *
     * @param  \App\Models\Email  $email
     * @return void
     */
    public function updated(Email $email)
    {
        session()->flash('success',"اطلاعات با موفقیت ویرایش شد. ");

    }

    /**
     * Handle the Email "deleted" event.
     *
     * @param  \App\Models\Email  $email
     * @return void
     */
    public function deleted(Email $email)
    {
        session()->flash('success',"اطلاعات با موفقیت حذف شد. ");

    }


}
