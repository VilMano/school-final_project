<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Duration;
class SearchController extends Controller
{
    // public function index(){
    //     return view('admin');
    // }

    public function search (Request $request){
        if ($request->ajax()){
            $output="";
            $courses=Course::where('name', 'LIKE', '%'.$request->search.'%')->get();
            if($courses){
                foreach($courses as $key => $course){
                    $output.='<tr>
                    <td>'.$course->name.'</td>
                    <td>'.$course->cost.'</td>
                    <td>'.$course->level->type.'</td>
                    <td>'.$course->duration->number.'</td>
                    <td>'.$course->duration->duration_type->type.'</td>
                    <td>'.$course->language.'</td>
                    <td><form action="/admin-courses/courses/'.$course->id.'" method="GET"><button class="btn btn-success">Abrir</button></form>
                    </tr>';
                }
                return Response($output);
            }
        }
    }
}