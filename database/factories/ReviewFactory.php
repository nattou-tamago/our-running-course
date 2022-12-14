<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'content' => $this->faker->realTextBetween(5, 40, 5),
            'created_at' => $this->faker->dateTimeBetween('-2 months'),
        ];
    }
}
