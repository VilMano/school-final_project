<?php

namespace App\Http\Controllers;
use App\User;
use App\Level;
use App\Course;
use App\Duration;
use App\courseEnrollment;
use App\durationType;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name_search = $request->name_search;
        $duration_search = $request->duration_search;
        $duration_num_search = $request->duration_num_search;
        $level_search = $request->level_search;
        $cost_search = $request->cost_search;

        if ($duration_search == 'Duração') {
            $duration_search = null;
        }
        if ($level_search == 'Nível') {
            $level_search = null;
        }
        if ($cost_search == 'Ascendente') {
            $cost_search = 'asc';
        } else {
            $cost_search = 'desc';
        }
        if ($duration_num_search == '---') {
            $duration_num_search = null;
        }

        $courses = DB::table('courses')->select('duration_types.type as type', 'courses.id as id', 'durations.number', 'levels.type as level', 'courses.name', 'courses.cost', 'courses.language', 'courses.image_url')
            ->leftJoin('durations', 'duration_id', 'durations.id')
            ->leftJoin('duration_types', 'id_duration_type', 'duration_types.id')
            ->join('levels', 'level_id', 'levels.id')
            ->when($name_search, function ($courses, $name_search) {
                return $courses->where('name', 'LIKE', '%' . $name_search . '%');
            })
            ->when($duration_search, function ($courses, $duration_search) {
                return $courses->where('duration_types.type', 'LIKE', '%' . $duration_search . '%');
            })
            ->when($duration_num_search, function ($courses, $duration_num_search) {
                return $courses->where('durations.number', 'LIKE', '%' . $duration_num_search . '%');
            })
            ->when($level_search, function ($courses, $level_search) {
                return $courses->where('levels.type', 'LIKE', '%' . $level_search . '%');
            })
            ->orderBy('cost', $cost_search)->paginate(9);

        $topCourse = CourseEnrollment::select('course_id')
            ->groupBy('course_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();

        $durations = DB::table('durations')->get();
        $duration_type = Duration::leftJoin('duration_types', 'id_duration_type', 'duration_types.id')->get();
        $levels = DB::table('levels')->get();

        return view('courses')->with(compact('durations'))
            ->with(compact('duration_type'))
            ->with(compact('levels'))
            ->with(compact('courses'))
            ->with(compact('topCourse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('')->with('id_duration)
        //                ->with('id_level');
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

            $request->validate([
                'name' => 'bail|required',
                'language' => 'required',
                'cost' => 'required|numeric',
                'description' => 'required',
                'level' => 'required',
                'duration_number' => 'required',
                'duration_type' => 'required'
            ]);

            // dd($request);
            // if($request->name = "1"){
            //     $error=[];
            //     $error=[null];
            //     return back()->withInput($error);
            // }

            $course = new Course();
            $number = $request->duration_number;
            $id_duration_type= $request->duration_type;
            $duration = new Duration();
            $duration = Duration::where([
                ['number', '=', $number],
                ['id_duration_type', '=', $id_duration_type],
                ])->first();
            // dd($duration);
            if($duration){
                $course->name = $request->name;
                $course->cost = floatval($request->cost);
                $course->description = $request->description;
                $course->image_url = $this->imageUploadPost($request);
                $course->certificate = $this->pdfUploadPost($request);
                $course->language = $request->language;
                $course->duration_id = $duration->id;
                $course->level_id = $request->level;
                $course->save();
                return redirect()->action('CourseController@showCourseAdmin', ['id'=>$course->id]);
            }

            $course->name = $request->name;
            $course->cost = floatval($request->cost);
            $course->description = $request->description;
            $course->image_url = $this->imageUploadPost($request);
            $course->certificate = $this->pdfUploadPost($request);
            $course->language = $request->language;
            $course->duration_id = Duration::insertGetId(
                ['number' => $number, 'id_duration_type' => $id_duration_type, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]
            );
            $course->level_id = $request->level;
            $course->save();
            return redirect()->action('CourseController@showCourseAdmin', ['id'=>$course->id]);

            //Copiado de outro projecto - não descomentar sff!
            // if(Favourite::where([
            //     ['article_id', '=', $article_id],
            //     ['user_id', '=', auth()->user()->id],
            //     ])->exists()){
            //     return view('warning_favourite');
            // }
        }
        return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $isCourseActive = DB::table('courses')->where('id', '=', $id)->where('is_active', '=', true)->exists();
            $loggedUser = Auth::user()->id;
            $isCoursePermitted = DB::table('course_enrollments')->where('course_id', '=', $id)->where('user_id', '=', $loggedUser)->where('is_permitted', '=', true)->exists();
            $lessons = DB::table('lessons')->where('course_id', '=', $id)->get();
            $hasLessons = DB::table('lessons')->where('course_id', '=', $id)->exists();
            $questions = Question::where('course_id', '=', $id)->get();
            $course = DB::table('courses')->where('id', '=', $id)->first();
            if($isCoursePermitted){
                return view('users.course')->with(compact('lessons'))
                ->with(compact('hasLessons'))
                ->with(compact('questions'))
                ->with(compact('course'));
            }else{
                return back();
            }
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course = Course::find($course->id);
        
        //return view('edit_view')->with($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $user=auth()->user();


        if (Gate::allows('admin-only', $user)) {
            $request->validate([
                'name' => 'required',
                'language' => 'required',
                'cost' => 'required|numeric',
                'description' => 'required',
                'level' => 'required|numeric',
                'duration_number' => 'required',
                'duration_type' => 'required'
            ]);    

            if(courseEnrollment::where('course_id', '=', $id)->exists()){
                // return "curso já existe";
                return view('messages.error-exists');
            }
            $course = Course::find($id);
            $number = $request->duration_number;
            $id_duration_type= $request->duration_type;

            $duration = Duration::where([
                ['number', '=', $number],
                ['id_duration_type', '=', $id_duration_type],
                ])->first();
            
            if($duration){
                $course->name = $request->name;
                $course->cost = floatval($request->cost);
                $course->description = $request->description;
                $course->image_url = $this->imageUploadPost($request); 
                $course->certificate = $this->pdfUploadPost($request);
                $course->language = $request->language;
                $course->duration_id = $duration->id;
                $course->level_id = $request->level;
                $course->is_active = $request->is_active;

                $course->save();
                return redirect()->action('CourseController@showCourseAdmin', ['id'=>$course->id]);
            }
            else{
                $course->name = $request->name;
                $course->cost = floatval($request->cost);
                $course->description = $request->description;
                $course->image_url = $this->imageUploadPost($request);
                $course->certificate = $this->pdfUploadPost($request);
                $course->language = $request->language;
                $course->is_active = $request->is_active;
                $course->duration_id = Duration::insertGetId(
                    ['number' => $number, 'id_duration_type' => $id_duration_type, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]
                );
                $course->level_id = $request->level;
                $course->save();
                return redirect()->action('CourseController@showCourseAdmin', ['id'=>$course->id]);
            }
            return view('messages.error');
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        // Course::destroy($course->id);
        // if(!isset($course->description, $course->url)){
        //     $course->description="Escreva algo...";
        //     $course->image_url="Escreva algo...";
        // };
        // //return view('/courses');
        
    }

    public function getMultiResource(){
        $totalCourses = DB::table('courses')->count();
        $totalSpecs = DB::table('specializations')->count();
        $totalUsers = DB::table('users')->count();

        $topCourses = CourseEnrollment::select('course_id', 'duration_types.type as type', 'durations.number', 'levels.type as level', 'courses.name', 'courses.cost', 'courses.language' )
        ->leftJoin('courses', 'course_id', 'courses.id')
        ->leftJoin('durations', 'duration_id', 'durations.id')
        ->leftJoin('duration_types', 'id_duration_type', 'duration_types.id')
        ->join('levels', 'level_id', 'levels.id')
            ->groupBy('course_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        return view('welcome')->with(compact('totalCourses'))
            ->with(compact('totalSpecs'))
            ->with(compact('totalUsers'))
            ->with(compact('topCourses'));
    }

    public function showCourseAdmin($id)
    {
        $user=auth()->user();


        if (Gate::allows('admin-only', $user)) {
            $course = Course::find($id);
            $levels = Level::all();
            $duration_types = durationType::all();

            // if(!isset($course->description, $course->url)){
            //     $course->description="Escreva algo...";
            //     $course->image_url="Escreva algo...";
            // };
            // if(is_null($course[$course->description])){
            //     $course->description="Escreva algo...";
            // };
            
            // if(array_key_exists($key, $array) && is_null($array[$key ])) {
            //     echo "key exists with a value of NULL" {{ $error }}
            return view('admin-courses.courses')
                ->with(compact('course'))
                ->with(compact('duration_types'))
                ->with(compact('levels'));
        }
        return view('auth.login');
    }
    
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUploadPost($request) 
    {
        request()->validate([

            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $image_saved_name = time().'.'.request()->image_url->getClientOriginalExtension();

        // dd($image_saved_name);

        request()->image_url->move(public_path('/images'), $image_saved_name);

        $image_to_database = "images/".$image_saved_name;

        return $image_to_database;
  

        // return back()

        //     ->with('success','You have successfully upload image.')

        //     ->with('image_url',$imageName);

    }

    public function contact(){
        return view('contact');
    }
    public function pdfUploadPost($request) 
    {
        request()->validate([

            'certificate' => 'required|mimes:pdf|max:2048',

        ]);

        $pdf_saved_name = time().'.'.request()->certificate->getClientOriginalExtension();

        // dd($image_saved_name);

        request()->certificate->move(public_path('/images/certificate'), $pdf_saved_name);

        $pdf_to_database = "images/certificate".$pdf_saved_name;

        return $pdf_to_database;
  

        // return back()

        //     ->with('success','You have successfully upload image.')

        //     ->with('image_url',$imageName);

    }
}
