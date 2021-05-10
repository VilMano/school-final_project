<?php

use App\optionQuestion;
use Illuminate\Database\Seeder;

class Option_questionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Qual é o elemento HTML correto para fazer um parágrafo?
        $option1 = new optionQuestion();
        $option1->id = 1;
        $option1->question_id = 1;
        $option1->is_correct = true;
        $option1->is_active = true;
        $option1->number = 1;
        $option1->body = '</br>';
        $option1->save();

        $option2 = new optionQuestion();
        $option2->id = 2;
        $option2->question_id = 1;
        $option2->is_correct = false;
        $option2->number = 2;
        $option2->body = '</a>';
        $option2->is_active = true;
        $option2->save();

        $option3 = new optionQuestion();
        $option3->id = 3;
        $option3->question_id = 1;
        $option3->is_correct = false;
        $option3->number = 3;
        $option3->body = '</div>';
        $option3->is_active = true;
        $option3->save();

        $option4 = new optionQuestion();
        $option4->id = 4;
        $option4->question_id = 1;
        $option4->is_correct = false;
        $option4->number = 4;
        $option4->body = '</>';
        $option4->is_active = true;
        $option4->save();

        //Qual é o elemento HTML correto para mudar a cor de fundo?
        $option5 = new optionQuestion();
        $option5->id = 5;
        $option5->question_id = 2;
        $option5->is_correct = false;
        $option5->number = 1;
        $option5->body = 'background: "black"';
        $option5->is_active = true;
        $option5->save();

        $option6 = new optionQuestion();
        $option6->id = 6;
        $option6->question_id = 2;
        $option6->is_correct = false;
        $option6->number = 2;
        $option6->body = 'background="black"';
        $option6->is_active = true;
        $option6->save();

        $option7 = new optionQuestion();
        $option7->id = 7;
        $option7->question_id = 2;
        $option7->is_correct = false;
        $option7->number = 3;
        $option7->body = 'background->black';
        $option7->is_active = true;
        $option7->save();

        $option8 = new optionQuestion();
        $option8->id = 8;
        $option8->question_id = 2;
        $option8->is_correct = true;
        $option8->number = 4;
        $option8->body = 'background: black;';
        $option8->is_active = true;
        $option8->save();

        //Qual é o elemento HTML correto para adicionar uma hiperligação?
        $option9 = new optionQuestion();
        $option9->id = 9;
        $option9->question_id = 3;
        $option9->is_correct = true;
        $option9->number = 1;
        $option9->body = '<a href="">';
        $option9->is_active = true;
        $option9->save();

        $option10 = new optionQuestion();
        $option10->id = 10;
        $option10->question_id = 3;
        $option10->is_correct = false;
        $option10->number = 2;
        $option10->body = '<hyperlink>';
        $option10->is_active = true;
        $option10->save();

        $option11 = new optionQuestion();
        $option11->id = 11;
        $option11->question_id = 3;
        $option11->is_correct = false;
        $option11->number = 3;
        $option11->body = '<hyperlink="">';
        $option11->is_active = true;
        $option11->save();

        $option12 = new optionQuestion();
        $option12->id = 12;
        $option12->question_id = 3;
        $option12->is_correct = false;
        $option12->number = 4;
        $option12->body = '<a hyper:"">';
        $option12->is_active = true;
        $option12->save();

        //Qual o carater correto para indicar o final de uma "tag"?
        $option13 = new optionQuestion();
        $option13->id = 13;
        $option13->question_id = 4;
        $option13->is_correct = true;
        $option13->number = 1;
        $option13->body = '/';
        $option13->is_active = true;
        $option13->save();

        $option14 = new optionQuestion();
        $option14->id = 14;
        $option14->question_id = 4;
        $option14->is_correct = false;
        $option14->number = 2;
        $option14->body = '>';
        $option14->is_active = true;
        $option14->save();

        $option15 = new optionQuestion();
        $option15->id = 15;
        $option15->question_id = 4;
        $option15->is_correct = false;
        $option15->number = 3;
        $option15->body = ')';
        $option15->is_active = true;
        $option15->save();

        $option16 = new optionQuestion();
        $option16->id = 16;
        $option16->question_id = 4;
        $option16->is_correct = false;
        $option16->number = 4;
        $option16->body = '}';
        $option16->is_active = true;
        $option16->save();

        //Qual é o elemento HTML correto para criar uma lista ordenada?
        $option17 = new optionQuestion();
        $option17->id = 17;
        $option17->question_id = 5;
        $option17->is_correct = false;
        $option17->number = 1;
        $option17->body = '<ul>';
        $option17->is_active = true;
        $option17->save();

        $option18 = new optionQuestion();
        $option18->id = 18;
        $option18->question_id = 5;
        $option18->is_correct = true;
        $option18->number = 2;
        $option18->body = '<ol>';
        $option18->is_active = true;
        $option18->save();

        $option19 = new optionQuestion();
        $option19->id = 19;
        $option19->question_id = 5;
        $option19->is_correct = false;
        $option19->number = 3;
        $option19->body = '<al>';
        $option19->is_active = true;
        $option19->save();

        $option20 = new optionQuestion();
        $option20->id = 20;
        $option20->question_id = 5;
        $option20->is_correct = false;
        $option20->number = 4;
        $option20->body = '<il>';
        $option20->is_active = true;
        $option20->save();

        //Qual é o elemento HTML correto para adicionar um "radio button"?
        $option21 = new optionQuestion();
        $option21->id = 21;
        $option21->question_id = 6;
        $option21->is_correct = false;
        $option21->number = 1;
        $option21->body = '<input type="text">';
        $option21->is_active = true;
        $option21->save();

        $option22 = new optionQuestion();
        $option22->id = 22;
        $option22->question_id = 6;
        $option22->is_correct = true;
        $option22->number = 2;
        $option22->body = '<input type="radio">';
        $option22->is_active = true;
        $option22->save();

        $option23 = new optionQuestion();
        $option23->id = 23;
        $option23->question_id = 6;
        $option23->is_correct = false;
        $option23->number = 3;
        $option23->body = '<input type="radiobutton">';
        $option23->is_active = true;
        $option23->save();

        $option24 = new optionQuestion();
        $option24->id = 24;
        $option24->question_id = 6;
        $option24->is_correct = false;
        $option24->number = 4;
        $option24->body = '<radio>';
        $option24->is_active = true;
        $option24->save();
    }
}
