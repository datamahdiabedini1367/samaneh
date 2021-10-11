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
            'startDate' =>convert_date($this->faker->dateTimeBetween('1300/01/01','1360/01/01')->format('Y/m/d'),'gregorian'),
            'endDate' =>convert_date($this->faker->dateTimeBetween('1361/01/01','1400/04/01')->format('Y/m/d'),'gregorian'),
            'description' =>$this->faker->text,

        ];
    }
}
