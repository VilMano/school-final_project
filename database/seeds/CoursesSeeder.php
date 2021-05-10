<?php

use App\Course;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course();
        $course->id = 1;
        $course->name = 'Html';
        $course->cost = 32;
        $course->certificate = '/images/certificate/html_certificate.pdf';
        $course->duration_id = 1;
        $course->is_active = true;
        $course->level_id = 1;
        $course->save();

        $course1 = new Course();
        $course1->id = 2;
        $course1->name = 'C#';
        $course1->cost = 2;
        $course1->duration_id = 2;
        $course1->level_id = 3;
        $course1->save();

        $course2 = new Course();
        $course2->id = 3;
        $course2->name = 'Excel';
        $course2->cost = 69;
        $course2->duration_id = 2;
        $course2->level_id = 2;
        $course2->save();

        $course3 = new Course();
        $course3->id = 4;
        $course3->name = 'Office';
        $course3->cost = 30;
        $course3->duration_id = 1;
        $course3->level_id = 2;
        $course3->save();

        $course4 = new Course();
        $course4->id = 5;
        $course4->name = 'Matemática';
        $course4->cost = 101;
        $course4->duration_id = 2;
        $course4->level_id = 3;
        $course4->save();

        $course5 = new Course();
        $course5->id = 6;
        $course5->name = 'Arquitetura Bases';
        $course5->cost = 48;
        $course5->duration_id = 2;
        $course5->level_id = 1;
        $course5->save();

        $course6 = new Course();
        $course6->id = 7;
        $course6->name = 'Mecânica';
        $course6->cost = 120;
        $course6->duration_id = 2;
        $course6->level_id = 2;
        $course6->save();

        $course7 = new Course();
        $course7->id = 8;
        $course7->name = 'Mecatronica';
        $course7->cost = 10;
        $course7->duration_id = 2;
        $course7->level_id = 3;
        $course7->save();

        $course8 = new Course();
        $course8->id = 9;
        $course8->name = 'Redes Avançado';
        $course8->cost = 37;
        $course8->duration_id = 2;
        $course8->level_id = 3;
        $course8->save();

        $course9 = new Course();
        $course9->id = 10;
        $course9->name = 'Laravel Inicio';
        $course9->cost = 40;
        $course9->duration_id = 2;
        $course9->level_id = 1;
        $course9->save();

        $course10 = new Course();
        $course10->id = 11;
        $course10->name = 'Laravel Intermedio';
        $course10->cost = 40;
        $course10->duration_id = 2;
        $course10->level_id = 2;
        $course10->save();

        $course11 = new Course();
        $course11->id = 12;
        $course11->name = 'Laravel Avançado';
        $course11->cost = 40;
        $course11->duration_id = 2;
        $course11->level_id = 3;
        $course11->save();

        $course12 = new Course();
        $course12->id = 13;
        $course12->name = 'Word';
        $course12->cost = 5;
        $course12->duration_id = 1;
        $course12->level_id = 1;
        $course12->save();
    }
}
