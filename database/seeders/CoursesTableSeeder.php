<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coursesCount = (int)$this->command->ask('How many courses would you like?', 70);

        $users = User::all();

        Course::factory($coursesCount)->make()->each(function ($course) use ($users) {
            $course->user_id = $users->random()->id;
            $course->save();
        });
    }
}
