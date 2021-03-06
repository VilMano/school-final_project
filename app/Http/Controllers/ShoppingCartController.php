<?php

namespace App\Http\Controllers;

use App\shoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cart');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(shoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(shoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(shoppingCart $shoppingCart)
    {
        //
    }
}
