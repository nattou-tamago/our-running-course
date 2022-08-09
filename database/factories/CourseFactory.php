<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realTextBetween(5, 15, 4),
            'location' => $this->faker->city(),
            'distance' => $this->faker->numberBetween(1, 40),
            'description' => $this->faker->realTextBetween(10, 50, 5),
        ];
    }
}
