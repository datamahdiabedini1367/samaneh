<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'startDate', 'endDate', 'description'];
    protected $table = 'projects';

    protected $perPage=5;

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user','project_id','user_id')
            ->withPivot(['deleted_at'])
            ->withTimestamps();
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_project','project_id','company_id')
            ->withPivot(['deleted_at'])
            ->withTimestamps();
    }
    public function persons()
    {
        return $this->belongsToMany(Person::class, 'person_project','project_id','person_id')
            ->withPivot(['deleted_at'])
            ->withTimestamps();
    }


    public function hasUser(User $user)
    {
         return $this->users()
            ->whereId($user->id)
            ->exists();
    }
    public function hasPerson(Person $person)
    {
        return $this->persons()
            ->whereId($person->id)
            ->exists();
    }
    public function hasCompany(Company $company)
    {
        return $this->companies()
            ->whereId($company->id)
            ->exists();
    }



    public function getStartDateProjectAttribute()
    {
        return convert_date($this->startDate, 'jalali');
    }

    public function getEndDateProjectAttribute()
    {
        return convert_date($this->endDate, 'jalali');
    }




}
