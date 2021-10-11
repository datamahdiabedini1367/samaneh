<?php

namespace App\Repositories;

use App\Models\Person;

interface PersonRepositoryInterface{


    public function getAll();
    public function getPerson(Person $person);

}
