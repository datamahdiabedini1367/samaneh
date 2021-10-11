<?php

namespace App\Observers;

use App\Models\Phone;

class PhoneObserver
{
    /**
     * Handle the Phone "created" event.
     *
     * @param  \App\Models\Phone  $phone
     * @return void
     */
    public function created(Phone $phone)
    {
        session()->flash('success',"اطلاعات با موفقیت ثبت شد. ");

    }

    /**
     * Handle the Phone "updated" event.
     *
     * @param  \App\Models\Phone  $phone
     * @return void
     */
    public function updated(Phone $phone)
    {
        session()->flash('success',"اطلاعات با موفقیت ویرایش شد. ");

    }

    /**
     * Handle the Phone "deleted" event.
     *
     * @param  \App\Models\Phone  $phone
     * @return void
     */
    public function deleted(Phone $phone)
    {
        session()->flash('success',"اطلاعات با موفقیت حذف شد.");
    }


}
