<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\optionQuestion;
use Illuminate\Http\Request;
use App\Course;

class OptionQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_question)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $user=auth()->user();


        if (Gate::allows('admin-only', $user)) {
            $course=Course::find($id);
            
            for($i=1; $i<=6; $i++){
                $option_question = new optionQuestion();
                $option_question->number = $i;
                $option_question->question_id = $request->id_question;
                $option_question->save();
            }

            $zero_options = optionQuestion::where('question_id', '=', $request->question_id)
                                        ->where('is_active', '=', true)->first();
            $any_true = optionQuestion::where('question_id', '=', $request->question_id)
                                    ->where('is_correct', '=', true)->first();
            $any_false =optionQuestion::where('question_id', '=', $request->question_id)
                                    ->where('is_correct', '=', false)->first();


            if($zero_options==null){
                $course->is_active = false;
                $course->save();
                // return "opções de questao criadas e curso inactivo";
                return redirect()->action('QuestionController@index', ['id'=>$course->id]);
            }else{
                if($any_true==null && $any_false==null){
                    $course->is_active = false;
                    $course->save();
                    // return "opções de questao criadas e curso inactivo";
                    return redirect()->action('QuestionController@index', ['id'=>$course->id]);
                }
            }
            return redirect()->action('QuestionController@index', ['id'=>$course->id]);
        }
        return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\optionQuestion  $optionQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(optionQuestion $optionQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\optionQuestion  $optionQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(optionQuestion $optionQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\optionQuestion  $optionQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $user=auth()->user();


        if (Gate::allows('admin-only', $user)) {
            $course=Course::find($id);
            $options=optionQuestion::where('question_id', "=", $request->id_question)->get(); 
            $i=1;
            foreach($options as $option){
                $option->body=$request->get("body".strval($i));
                if($option->body != null){
                $option->is_correct = $request->get("is_correct".strval($i));
                $option->is_active = $request->get("is_active".strval($i));
                if($option->is_correct != null && $option->is_active != null){
                $option->save();
                }else{
                    return view('messages.error');
                }
                $i++;
            }else{
                return view('messages.error');
            }
            }
            $zero_options = optionQuestion::where('question_id', '=', $request->id_question)
                                        ->where('is_active', '=', true)->first();
            
            $any_true = optionQuestion::where('question_id', '=', $request->id_question)
                                    ->where('is_correct', '=', true)->first();
            $any_false = optionQuestion::where('question_id', '=', $request->id_question)
                                    ->where('is_correct', '=', false)->first();

            if($zero_options==null){
                $course->is_active = false;
                $course->save();
                // return "opções de questao modif e curso inactivo zero";
                return redirect()->action('QuestionController@index', ['id'=>$course->id]);
            }else{
                if($any_true==null || $any_false==null){
                    $course->is_active = false;
                    $course->save();
                    // return "opções de questao modif e curso inactivo";
                    return redirect()->action('QuestionController@index', ['id'=>$course->id]);
                }
            }
            return redirect()->action('QuestionController@index', ['id'=>$course->id]);
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\optionQuestion  $optionQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(optionQuestion $optionQuestion)
    {
        //
    }
}
