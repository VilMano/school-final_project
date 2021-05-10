<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(Duration_typesSeeder::class);
        $this->call(DurationsSeeder::class);
        $this->call(LevelsSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(Course_enrollmentsSeeder::class);
        $this->call(ShoppingCartsTableSeeder::class);
        $this->call(LessonsSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(Option_questionsSeeder::class);
    }
}
