<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TimeSlot;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeSlots = TimeSlot::all();
        $data['timeSlots'] = $timeSlots;

        return view('pages.admin.time-slots.index')->with(compact('data'));
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
        $timeSlot = new TimeSlot;

        $timeSlot->name = "";
        $timeSlot->name_ar = $request->name_ar;
        
        $timeSlot->save();
        
        // $timeSlots = timeSlot::all(); 
        return redirect()->route('admins.time-slots.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $timeSlot = TimeSlot::find($id);
        
        
        $timeSlot->name = "";
        $timeSlot->name_ar = $request->name_ar;

        $timeSlot->save();
        
        // $timeSlots = timeSlot::all(); 
        return redirect()->route('admins.time-slots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeSlot = TimeSlot::find($id);
        $timeSlot->delete();

        return redirect()->route('admins.time-slots.index');
    }
}
