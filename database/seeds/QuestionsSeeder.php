<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question1 = new Question();
        $question1->id = 1;
        $question1->course_id = 1;
        $question1->body = 'Qual é o elemento HTML correto para fazer um parágrafo?';
        $question1->number = 1;
        $question1->is_active = true;
        $question1->save();

        $question2 = new Question();
        $question2->id = 2;
        $question2->course_id = 1;
        $question2->body = 'Qual é o elemento CSS correto para mudar a cor de fundo?';
        $question2->number = 2;
        $question2->is_active = true;
        $question2->save();

        $question3 = new Question();
        $question3->id = 3;
        $question3->course_id = 1;
        $question3->body = 'Qual é o elemento HTML correto para adicionar uma hiperligação?';
        $question3->number = 3;
        $question3->is_active = true;
        $question3->save();

        $question4 = new Question();
        $question4->id = 4;
        $question4->course_id = 1;
        $question4->body = 'Qual o carater correto para indicar o final de uma "tag"?';
        $question4->number = 4;
        $question4->is_active = true;
        $question4->save();

        $question5 = new Question();
        $question5->id = 5;
        $question5->course_id = 1;
        $question5->body = 'Qual é o elemento HTML correto para criar uma tabela ordenada?';
        $question5->number = 5;
        $question5->is_active = true;
        $question5->save();

        $question6 = new Question();
        $question6->id = 6;
        $question6->course_id = 1;
        $question6->body = 'Qual é o elemento HTML correto para adicionar um "radio button"?';
        $question6->number = 6;
        $question6->is_active = true;
        $question6->save();
    }
}
