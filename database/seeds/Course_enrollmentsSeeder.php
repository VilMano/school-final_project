<?php

use App\courseEnrollment;
use Illuminate\Database\Seeder;

class Course_enrollmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_en = new courseEnrollment();
        $course_en->id = 1;
        $course_en->user_id = 1;
        $course_en->course_id = 1;
        $course_en->is_permitted = true;
        $course_en->save();

        $course_en = new courseEnrollment();
        $course_en->id = 2;
        $course_en->user_id = 2;
        $course_en->course_id = 1;
        $course_en->save();

        $course_en = new courseEnrollment();
        $course_en->id = 3;
        $course_en->user_id = 3;
        $course_en->course_id = 1;
        $course_en->save();

        $course_en = new courseEnrollment();
        $course_en->id = 4;
        $course_en->user_id = 2;
        $course_en->course_id = 2;
        $course_en->save();

        $course_en = new courseEnrollment();
        $course_en->id = 5;
        $course_en->user_id = 2;
        $course_en->course_id = 2;
        $course_en->save();

        $course_en = new courseEnrollment();
        $course_en->id = 6;
        $course_en->user_id = 2;
        $course_en->course_id = 3;
        $course_en->save();
    }
}
