<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        dd($this->faker->company);
        return [
            'name' =>$this->faker->company,
            'registration_date' =>convert_date($this->faker->dateTime()->format('Y/m/d'),'jalali'),
            'address' =>$this->faker->address,
            'registration_number' =>$this->faker->buildingNumber,
            'description' =>$this->faker->text,

        ];
//        dd();
    }
}
