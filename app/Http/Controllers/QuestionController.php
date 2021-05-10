<?php

namespace App\Http\Controllers;
use App\Course;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $user=auth()->user();


        if (Gate::allows('admin-only', $user)) {
            $course = Course::find($id);

            $questions = Question::where('course_id', '=', $id)->get();
            
            
            return view ('admin-courses.admin-questions.questions')
                ->with(compact('questions'))
                ->with(compact('course'));
        }
        return view('auth.login');
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
    public function store(Request $request)
    {
        $user=auth()->user();


        if (Gate::allows('admin-only', $user)) {
            $course = Course::find($request->id);
            $questions_to_create = $request->questions_to_create;
            $last_question = Question::where('course_id', '=', $request->id)->orderby('number', 'desc')->first();
            if($last_question==null){
                $last_created_question = 0;
            }else{
                $last_created_question=$last_question->number;
            }


            for($i=1; $i<=$questions_to_create; $i++){
                $question = new Question();
                $question->number = $last_created_question+$i;
                $question->course_id = intval($request->id);
                $question->body = "Questão ".strval($question->number);
                $question->save();
            }
            $questions=Question::where('course_id', '=', $request->id)->get();
            return redirect()->action('QuestionController@index', ['id'=>$course->id]);
        }
        return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $user=auth()->user();


        if (Gate::allows('admin-only', $user)) {
            $request->validate([
                'body' => 'required',
                'is_active' => 'required'
            ]);
            $course=Course::find($id);
            $questions=Question::where('course_id', '=', $id)->get();
            $question = Question::find($request->id_question);
            $question->body = $request->body;
            $question->is_active = $request->is_active;
            $question->save();
            return redirect()->action('QuestionController@index', ['id'=>$course->id]);
        }
        return view('auth.login');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
