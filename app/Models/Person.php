<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'firstName', 'nikeName', 'lastName', 'fatherName', 'motherName', 'married',
        'birthdate', 'birthdatePlace', 'gender', 'nationalCode', 'address', 'bio',
        'entertainments', 'personalFavorites', 'politicalOrientation', 'languageUse',
    ];

    protected $table = 'persons';

    public function getGenderPersonAttribute()
    {
        return $this->gender ? 'مرد' : 'زن';
    }

    public function getMarriedPersonAttribute()
    {
        return $this->married ? 'متاهل' : 'مجرد';
    }

    public function getBirthdatePersonAttribute()
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $output = str_replace($english, $persian, $this->birthdate);
        $date = convert_date($this->birthdate, 'gregorian');

        return $output;
    }

    public function companies()
    {
        return $this->belongsToMany(
            Company::class,
            'company_person',
            'person_id',
            'company_id')
            ->withPivot(['reasonLeavingJob', 'startDate', 'endDate', 'semat', 'section', 'deleted_at'])
            ->withTimestamps();
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'person_project', 'person_id', 'project_id')
            ->withPivot(['deleted_at'])
            ->withTimestamps();
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

    public function phones()
    {
        return $this->morphMany(
            Phone::class,
            'phone'
        );
    }

    public function accounts()
    {
        return $this->morphMany(
            Account::class,
            'account'
        );
    }

    public function educationals()
    {
        return $this->hasMany(Educational::class, 'person_id', 'id');
    }

    public function relatedPerson()
    {
        return $this->belongsToMany(
            Person::class,
            'person_related',
            'person_id',
            'related_id'
        )->withPivot(['individual_id', 'description'])
            ->withTimestamps();

    }


    public function addEmails(array $emails)
    {
        $emails = collect($emails)->filter(function ($item) {
            if (!empty($item['value'])) {
                return $item;
            }
        })->toArray();

        foreach ($emails as $item) {
            $email = new Email(
                ['value' => $item['value'],
                    'email_id' => $this->id,
                    'email_type' => Person::class,]
            );
            $this->emails()->save($email);
        }
    }

    public function addPhones(array $phones)
    {
        $phones = collect($phones)->filter(function ($item) {
            if (!empty($item['value'])) {
                return $item;
            }
        })->toArray();

        foreach ($phones as $item) {
            $phone = new Phone([
                'value' => $item['value'],
                'phone_id' => $this->id,
                'phone_type' => Person::class,
            ]);
            $this->phones()->save($phone);
        }
    }

//    public function getPhonesAttribute(){
//
//@php
//$phonesperson='';
//foreach($person->phones as $phone){
//$phonesperson=$phone->value.' - '.$phonesperson;
//}
//$phonesperson=substr($phonesperson, 0, -4);
//@endphp
//    }


}
