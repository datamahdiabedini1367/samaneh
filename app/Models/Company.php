<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'registration_date',
        'address', 'registration_number', 'description'];
    protected $table = 'companies';

    public function getRegistrationDateCompanyAttribute()
    {
        $date = convert_date($this->registration_date, 'gregorian');

        return $date;
    }


    public function photos()
    {
        return $this->morphMany(Photo::class, 'photo');
    }

    public function emails()
    {
        return $this->morphMany(
            Email::class,
            'email'
        );
    }

    public function accounts()
    {
        return $this->morphMany(
            Account::class,
            'account'

        );
    }



    public function phones()
    {
        return $this->morphMany(
            Phone::class,
            'phone'
        );
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'company_project', 'company_id', 'project_id')
            ->withPivot('deleted_at ')
            ->withTimestamps();
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'company_person', 'company_id', 'person_id')
            ->withPivot(['reasonLeavingJob', 'startDate', 'endDate', 'semat', 'section', 'deleted_at'])
            ->withTimestamps();
    }

    public function hasPerson(Person $person)
    {
        return $this->persons()->withPivot(['reasonLeavingJob', 'startDate', 'endDate', 'semat', 'section', 'deleted_at'])
            ->where('person_id', $person->id)
            ->exists();

//        return $this->persons()->withPivot(['reasonLeavingJob', 'startDate', 'endDate', 'semat', 'section','deleted_at'])->
//                    ->whereId($person->id)
//                    ->exists();
    }



    public function addEmails(array $emails)
    {

        $emails1 = collect($emails)->filter(function ($item) {
            if (!empty($item['value'])) {
                return $item;
            }
        })->toArray();

        foreach ($emails1 as $item) {
            $email = [
                'value' => $item['value'],
                'email_id' => $this->id,
                'email_type' => Company::class,
            ];
            $this->emails()->create($email);
        }
    }

    public function addPhones(array $phones)
    {
        $phones1 = collect($phones)->filter(function ($item) {
            if (!empty($item['value'])) {
                return $item;
            }
        })->toArray();

        foreach ($phones1 as $item) {
            $phone = [
                    'value' => $item['value'],
                    'phone_id' => $this->id,
                    'phone_type' => Company::class,
                ];
            $this->phones()->create($phone);
        }
    }


}
