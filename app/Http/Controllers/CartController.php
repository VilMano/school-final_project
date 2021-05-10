<?php

namespace App\Http\Controllers;

use App\shoppingCart;
use App\courseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $loggedUser = Auth::user()->id;
            $coursesInCart = DB::table('shopping_carts')->select('shopping_carts.id', 'courses.name', 'courses.cost')
                                                        ->leftJoin('courses', 'shopping_carts.course_id', 'courses.id')
                                                        ->where('shopping_carts.user_id', '=', $loggedUser)->get();
            return response()->json($coursesInCart, 200);
        }catch(Exception $e){
            return response()->json(["error" => $e], 500);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loggedUser = Auth::user()->id;
        $courseOwned = DB::table('course_enrollments')->where('user_id', '=', $loggedUser)->where('course_id', '=', $request->course_id)->exists();
        $coursePermitted = DB::table('course_enrollments')->where('user_id', '=', $loggedUser)->where('course_id', '=', $request->course_id)->where('is_permitted', '=', true)->exists();
        $alreadyInCart = DB::table('shopping_carts')->where('user_id', '=', $loggedUser)->where('course_id', '=', $request->course_id)->exists();
        $course = DB::table('courses')->where('id', '=', $request->course_id)->first();
        try{
            if($coursePermitted){
                return response()->json(["success" => "O curso <a href='/courses/".$course->id."'><strong>".$course->name."</strong></a> já foi comprado"],200);
            }else{
                return response()->json(["success" => "O curso <strong>".$course->name."</strong> já foi comprado"],200);
            }

            if(!$courseOwned && !$alreadyInCart){
                $courseToCart = new shoppingCart();
                $courseToCart->course_id = $request->course_id;
                $courseToCart->user_id = Auth::user()->id;
                $courseToCart->save();
                return response()->json(["success" => "Adicionou ".$course->name." ao carrinho"],200);         
            }else{
                return response()->json(["error" => "O curso ".$course->name." já se encontra no seu carrinho"],400);            
            }    
        }catch(Exception $e){
            return response()->json(["error" => $e], 500);
        }
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try{
            DB::table('shopping_carts')->where('id', '=', $request->id)->delete();
            return response()->json(['success' => 'Deleted with success'], 200);
        }catch(Exception $e){
            return response()->json(['error' => $e], 400);
        }        
    }

    public function shoppingCart(Request $request){
        try{
            $loggedUser = Auth::user()->id;
            $coursesInCart = DB::table('shopping_carts')->select('shopping_carts.id AS item_id', 'course_id', 'courses.name', 'courses.cost')
                                                        ->leftJoin('courses', 'course_id', 'courses.id')
                                                        ->where('user_id', '=', $loggedUser)->get();
            
            return response()->json($coursesInCart, 200);
        }catch(Exception $e){
            return response()->json(["error" => $e], 500);
        }        
    }

    public function successBuy(){
        $loggedUser = Auth::user()->id;
        $final_price = DB::table('shopping_carts')
                                                  ->leftJoin('courses', 'course_id', 'courses.id')
                                                  ->where('user_id', '=', $loggedUser)->sum('cost');
        DB::table('shopping_carts')->where('user_id', '=', $loggedUser)->delete();                                                  
        return view('successBuy')->with(compact('final_price'));
    }

    public function insertCourses(Request $request){
        $loggedUser = Auth::user()->id;
        try{
                $courseInCart = DB::table('shopping_carts')->where('user_id', '=', $loggedUser)->get();
                foreach($courseInCart as $course){
                $courseInsert = new courseEnrollment();
                $courseInsert->course_id = $course->course_id;
                $courseInsert->user_id = $loggedUser;
                $courseInsert->save();
                }

                return response()->json(["success" => "Successfully added"], 200);
        }catch(Exception $e){
            return response()->json(["error" => $e],500);
        }
    }
}
