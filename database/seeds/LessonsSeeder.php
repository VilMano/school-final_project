<?php

use Illuminate\Database\Seeder;
use App\Lesson;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = new Lesson();
        $lesson->id = 1;
        $lesson->name = "introducao";
        $lesson->number = 1;
        $lesson->video_url = "video url";
        $lesson->course_id = 1;
        $lesson->save();
    }
}
