<?php

namespace App\Http\Controllers;

use App\Premises;
use Illuminate\Http\Request;

class PremisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(['status' => 'ok', 'data' => Premises::all()]);
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
     * @param  \App\Premises  $premises
     * @return \Illuminate\Http\Response
     */
    public function show(Premises $premises)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Premises  $premises
     * @return \Illuminate\Http\Response
     */
    public function edit(Premises $premises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Premises  $premises
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Premises $premises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Premises  $premises
     * @return \Illuminate\Http\Response
     */
    public function destroy(Premises $premises)
    {
        //
    }
}
