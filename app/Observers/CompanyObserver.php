<?php

namespace App\Observers;

use App\Models\Company;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function created(Company $company)
    {
        session()->flash('success',"اطلاعات شرکت {$company->name} با موفقیت ثبت شد. ");

    }

    /**
     * Handle the Company "updated" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function updated(Company $company)
    {
        session()->flash('success',"اطلاعات شرکت {$company->name} با موفقیت ویرایش شد. ");

    }

    /**
     * Handle the Company "deleted" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function deleted(Company $company)
    {
        session()->flash('success',"اطلاعات شرکت {$company->name} با موفقیت حذف شد. ");

    }


}
