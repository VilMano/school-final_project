<?php

namespace App\Http\Controllers;
use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LessonController extends Controller
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

            $lessons = Lesson::where('course_id', '=', $id)->get();
            
            
            return view ('admin-courses.admin-lessons.lessons')
                ->with(compact('lessons'))
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
            $lessons_to_create = $request->lessons_to_create;
            $last_lesson = Lesson::where('course_id', '=', $request->id)->orderby('number', 'desc')->first();
            if($last_lesson==null){
                $last_created_lesson = 0;
            }else{
                $last_created_lesson=$last_lesson->number;
            }


            for($i=1; $i<=$lessons_to_create; $i++){
                $lesson = new Lesson();
                $lesson->number = $last_created_lesson+$i;
                $lesson->course_id = intval($request->id);
                $lesson->name = "Lição ".strval($lesson->number);
                $lesson->video_url = "Vídeo da lição ".strval($lesson->number);
                $lesson->save();
            }
            $nolessons=Lesson::where('course_id', '=', $course->id)
                            ->where('is_active', '=', true)->first();
            if($nolessons==null){
                $course->is_active = false;
                $course->save();
                // return "lição criada e curso inactivo";
                // return view('messages.success');
                return redirect()->action('LessonController@index', ['id'=>$course->id]);
            }
            $lessons=Lesson::where('course_id', '=', $request->id)->get();
            return redirect()->action('LessonController@index', ['id'=>$course->id]);
        }
        return view('auth.login');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $user=auth()->user();


        if (Gate::allows('admin-only', $user)) {
            $request->validate([
                'name' => 'required',
                'video_url' => 'required'
            ]);

            $course=Course::find($id);
            $lesson = Lesson::find($request->id_lesson);
            $lesson->name = $request->name;
            $lesson->is_active = $request->is_active;
            $lesson->video_url = $request->video_url;
            $lesson->save();
            $nolessons=Lesson::where('course_id', '=', $id)
                            ->where('is_active', '=', true)->first();
            if($nolessons==null){
                $course->is_active = false;
                $course->save();
                // return "lição alterada e curso inactivo";
                return redirect()->action('LessonController@index', ['id'=>$course->id]);
            }
            else{
                $lessons=Lesson::where('course_id', '=', $request->id)->get();
                return redirect()->action('LessonController@index', ['id'=>$course->id]);
            }
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
