<?php

namespace App\Observers;

use App\Models\CompanyPerson;

class CompanyPersonObserver
{
    /**
     * Handle the CompanyPerson "created" event.
     *
     * @param  \App\Models\CompanyPerson  $companyPerson
     * @return void
     */
    public function created(CompanyPerson $companyPerson)
    {
        session()->flash('success',"اطلاعات  با موفقیت ثبت شد. ");
    }

    /**
     * Handle the CompanyPerson "updated" event.
     *
     * @param  \App\Models\CompanyPerson  $companyPerson
     * @return void
     */
    public function updated(CompanyPerson $companyPerson)
    {
        session()->flash('success',"اطلاعات  با موفقیت ویرایش شد. ");
    }

    /**
     * Handle the CompanyPerson "deleted" event.
     *
     * @param  \App\Models\CompanyPerson  $companyPerson
     * @return void
     */
    public function deleted(CompanyPerson $companyPerson)
    {
        session()->flash('success',"اطلاعات  با موفقیت حذف شد. ");

    }

    /**
     * Handle the CompanyPerson "restored" event.
     *
     * @param  \App\Models\CompanyPerson  $companyPerson
     * @return void
     */
    public function restored(CompanyPerson $companyPerson)
    {
        //
    }

    /**
     * Handle the CompanyPerson "force deleted" event.
     *
     * @param  \App\Models\CompanyPerson  $companyPerson
     * @return void
     */
    public function forceDeleted(CompanyPerson $companyPerson)
    {
        //
    }
}
