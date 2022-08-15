<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class CourseTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagCount = Tag::all()->count();

        if ($tagCount === 0) {
            $this->command->info('No tags found, skipping assigning tags to courses.');
            return;
        }

        $howManyMin = (int)$this->command->ask('Minimum tags on course?', 0);
        $howManyMax = min((int)$this->command->ask('Maximum tags on course?', $tagCount), $tagCount);

        Course::all()->each(function (Course $course) use($howManyMin, $howManyMax) {
            $take = random_int($howManyMin, $howManyMax);
            $tags = Tag::inRandomOrder()->take($take)->get()->pluck('id');
            $course->tags()->sync($tags);
        });
    }
}
