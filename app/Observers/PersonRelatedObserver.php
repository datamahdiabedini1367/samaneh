<?php

namespace App\Observers;

use App\Models\Person;
use App\Models\PersonRelated;

class PersonRelatedObserver
{
    /**
     * Handle the PersonRelated "created" event.
     *
     * @param  \App\Models\PersonRelated  $personRelated
     * @return void
     */
    public function created(PersonRelated $personRelated)
    {
        session()->flash('success',"اطلاعات با موفقیت ثبت شد. ");

    }

    /**
     * Handle the PersonRelated "updated" event.
     *
     * @param  \App\Models\PersonRelated  $personRelated
     * @return void
     */
    public function updated(PersonRelated $personRelated)
    {
        dd("stop");
        session()->flash('success',"اطلاعات با موفقیت ویرایش شد. ");

    }

    /**
     * Handle the PersonRelated "deleted" event.
     *
     * @param  \App\Models\PersonRelated  $personRelated
     * @return void
     */
    public function deleted(PersonRelated $personRelated)
    {
        session()->flash('success',"اطلاعات با موفقیت حذف شد. ");

    }

}
