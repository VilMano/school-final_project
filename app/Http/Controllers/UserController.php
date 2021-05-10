<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Response;

class UserController extends Controller
{
    public function index(){
        $loggedUser = Auth::user()->id;
        $user = User::find($loggedUser);
        return response()->json($user, 200);
    }

    public function update(Request $request){
        try{
            if($request->name != null && $request->address != null && $request->postal_code != null && $request->city != null && $request->country != null && $request->nif != null){
                $loggedUser = Auth::user()->id;
                $user = new User();
                $user = User::find($loggedUser);
                $user->name = $request->name;
                $user->lastname = $request->last_name;
                $user->address = $request->address;
                $user->postal_code = $request->postal_code;
                $user->city = $request->city;
                $user->country = $request->country;
                $user->nif = $request->nif;
                $user->save();
                return response()->json(["success" => "Atualizado com sucesso"],200);
            }else{
                return response()->json(["error" => "Preencha todos os campos"],500);
            }
        }catch(Exception $e){
            return response()->json(["error" => $e],400);
        }
    }

    public function dashboard(){
        try{
            $loggedUser = Auth::user()->id;

            $finishedCourse = DB::table('course_enrollments')->where('date_completion', '!=', null)->orWhereNull('date_completion')->first();

            $courses = DB::table('course_enrollments')->select('courses.id as id', 'courses.name as name', 'course_enrollments.is_permitted', 'courses.description as description', 'course_enrollments.grade', 'course_enrollments.tests_taken', 'courses.certificate')
                                                      ->leftJoin('courses', 'course_id', 'courses.id')
                                                      ->where('course_enrollments.is_permitted', '=', true)
                                                      ->where('courses.is_active', '=', true)
                                                      ->where('user_id', '=', $loggedUser)->get();
            $hasCourses = DB::table('course_enrollments')->leftJoin('courses', 'course_id', 'courses.id')
                                                        ->where('user_id', '=', $loggedUser)
                                                        ->where('course_enrollments.is_permitted', '=', true)
                                                        ->where('courses.is_active', '=', true)
                                                        ->exists();

            $isCourseActive = DB::table('course_enrollments')->leftJoin('courses', 'course_id', 'courses.id')
                                                         ->where('user_id', '=', $loggedUser)
                                                         ->where('courses.is_active', '=', true)
                                                         ->exists();

            return view('users.user-courses')->with(compact('courses'))
                                            ->with(compact('hasCourses'))
                                            ->with(compact('isCourseActive'))
                                            ->with(compact('finishedCourse'));

        }catch(Exception $e){
            return abort(500);
        }
    }

    public function downloadIMG($id){
        try{
        $cert_path = DB::table('courses')->where('id', '=', $id)->first();
        $path = $cert_path->certificate;        
        $file = public_path().$path;
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, 'certificado.pdf',$headers);
    }catch(Exception $e){
        return $e;
    }
    }
}
