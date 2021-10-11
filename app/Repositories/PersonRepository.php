<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository implements PersonRepositoryInterface
{

    public function getAll()
    {
        return Person::all();
    }

    public function getPerson(Person $person)
    {
        return $person;
    }
}
