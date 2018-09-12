<?php

namespace App\Http\Controllers;

use App\PickersPoint;
use Illuminate\Http\Request;

class PickersPointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\PickersPoint  $pickersPoint
     * @return \Illuminate\Http\Response
     */
    public function show(PickersPoint $pickersPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PickersPoint  $pickersPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(PickersPoint $pickersPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PickersPoint  $pickersPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PickersPoint $pickersPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PickersPoint  $pickersPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickersPoint $pickersPoint)
    {
        //
    }

    public function addpp() {
        return view('pickerspoint.addpp');
    }
}
