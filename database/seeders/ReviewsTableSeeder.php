<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();

        if ($courses->count() === 0) {
            $this->command->info('There are no courses, so no reviews will be added');
            return;
        }

        $reviewsCount = (int)$this->command->ask('How many reviews would you like?', 200);

        $users = User::all();

        Review::factory($reviewsCount)->make()->each(function ($review) use ($courses, $users) {
            $review->course_id = $courses->random()->id;
            $review->user_id = $users->random()->id;
            $review->save();
        });
    }
}
