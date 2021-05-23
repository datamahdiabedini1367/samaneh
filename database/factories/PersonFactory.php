<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        dd($this->faker->company);
        return [
            'firstName' => $this->faker->firstName,
            'nikeName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'fatherName' => $this->faker->firstNameMale,
            'motherName' => $this->faker->firstNameFemale,
            'married' => $this->faker->boolean,
            'birthdate' => convert_date($this->faker->dateTime()->format('Y/m/d'), 'jalali'),
            'birthdatePlace' => $this->faker->streetAddress,
            'gender' => array_rand([0,1]),
            'nationalCode' => substr($this->faker->creditCardNumber('MasterCard'),0,10),
            'address' => $this->faker->address,
            'bio' => $this->faker->text,
            'entertainments' => $this->faker->text,
            'personalFavorites' => $this->faker->text,
            'politicalOrientation' => $this->faker->text,
            'languageUse' => $this->faker->text,

        ];
    }
}
