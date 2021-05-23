<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate=$this->faker->dateTime()->format('Y/m/d');
        return [
            'name' =>$this->faker->name,
            'startDate' =>convert_date($startDate,'jalali'),
            'endDate' =>convert_date($this->faker->dateTimeBetween($startDate,'+10 years')->format('Y/m/d'),'jalali'),
            'description' =>$this->faker->text,

        ];
    }
}
