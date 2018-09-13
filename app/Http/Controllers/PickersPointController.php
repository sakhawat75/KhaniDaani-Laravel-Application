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

        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'type' => 'required|max:20',
            'open_at' => 'required',
            'close_at' => 'required',
            'charge' => 'required|integer|min:10|max:50',
            'address' => 'required|max:100',
            'address_hint' => 'required|max:50',
            'phone' => 'required',

        ]);

        $user = auth()->user();

        $pp = new PickersPoint;
        $pp->user_id = $user->id;
        $pp->name = $request->input('name');
        $pp->type = $request->input('type');
        $pp->open_at = $request->input('open_at');
        $pp->close_at = $request->input('close_at');
        $pp->charge = $request->input('charge');
        $pp->address = $request->input('address');
        $pp->address_hint = $request->input('address_hint');
        $pp->phone = $request->input('phone');

        $pp->save();



        return redirect()->route('profile.pickerspoint', ['profile' => $user->id])->with('success', 'New PickersPoint is Created Successfully');

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
