<?php

namespace App\Observers;

use App\Models\Educational;

class EducationalObserver
{
    /**
     * Handle the Educational "created" event.
     *
     * @param  \App\Models\Educational  $educational
     * @return void
     */
    public function created(Educational $educational)
    {
        session()->flash('success',"اطلاعات با موفقیت ثبت شد. ");

    }

    /**
     * Handle the Educational "updated" event.
     *
     * @param  \App\Models\Educational  $educational
     * @return void
     */
    public function updated(Educational $educational)
    {
        session()->flash('success',"اطلاعات با موفقیت ویرایش شد. ");

    }

    /**
     * Handle the Educational "deleted" event.
     *
     * @param  \App\Models\Educational  $educational
     * @return void
     */
    public function deleted(Educational $educational)
    {
        session()->flash('success',"اطلاعات با موفقیت حذف شد. ");
    }


}
