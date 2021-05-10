<?php

namespace App\Http\Controllers;

use App\courseEnrollment;
use App\optionQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class CourseEnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseRequests = DB::table('course_enrollments')->select('courses.name as name', 'users.name as username', 'users.id as userID', 'courses.id as courseID', 'course_enrollments.id')->leftJoin('courses', 'course_id', 'courses.id')
                                                         ->leftJoin('users', 'user_id', 'users.id')
                                                         ->where('is_permitted', '=', false)->get();
        $hasRequests = DB::table('course_enrollments')->where('is_permitted', '=', false)->get();
        if($hasRequests){
            return response()->json(['success' => $courseRequests], 200);
        }else{
            return response()->json(['error' => 'Não tem inscrições pendentes'], 400);
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\courseEnrollment  $courseEnrollment
     * @return \Illuminate\Http\Response
     */
    public function show(courseEnrollment $courseEnrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\courseEnrollment  $courseEnrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(courseEnrollment $courseEnrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courseEnrollment  $courseEnrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, courseEnrollment $courseEnrollment)
    {
        $loggedUser = Auth::user()->id;
        $size = count($request->all())-2;
        $grade = 0;
        for($i = 1; $i < $size+1; $i++){
            $answer_id = (int)$request->get('group'.$i);
            if($answer_id == null){
                return abort(204);
            }else{
                $user_answer = optionQuestion::find($answer_id);
                if($user_answer->is_correct){
                    $grade += 1/$size*100;
                }else{
                    $grade += 0;
                }
            }            
        }
        $user_grade = courseEnrollment::where('user_id', '=', $loggedUser)->first();
        $grade_double = round($grade,1);
        if($user_grade->tests_taken == null){
            $user_grade->grade = (double)$grade_double;
        }elseif($grade_double > $user_grade->grade){
            $user_grade->grade = (double)$grade_double;
        }
        if($grade_double > 50){
        $user_grade->date_completion = \Carbon\Carbon::now();
        }
        $user_grade->tests_taken += 1;
        $user_grade->save();
        return view('users.test-results')->with(compact('user_grade'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\courseEnrollment  $courseEnrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        courseEnrollment::destroy($request->courseID);
        return response()->json(['success' => 'Deleted with success']);        
    }

    public function updateEnrollment(Request $request){
        $enrollment = new courseEnrollment();
        $enrollmentID = DB::table('course_enrollments')->where('user_id', '=', $request->userID)->where('course_id', '=', $request->courseID)->first();
        $enrollment = courseEnrollment::find($enrollmentID->id);        
        $enrollment->is_permitted = true;
        $enrollment->save();
        return response()->json(['success' => 'Updated with success']);
    }
}
