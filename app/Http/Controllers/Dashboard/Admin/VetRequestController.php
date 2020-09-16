<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\VetRequest;
use App\Model\Animal;
use App\Model\Size;
use App\Model\TimeSlot;

class VetRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vetRequests = VetRequest::all();
        $data['vetRequests'] = $vetRequests;

        return view('pages.admin.vet-requests.index')->with(compact('data'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vetRequest = VetRequest::find($id);
        $data = array();

        
        $sizes = Size::all();
        $animals = Animal::all();
        $timeslots = TimeSlot::all();
        $data['vetRequest'] = $vetRequest;
        $data['sizes'] = $sizes;
        $data['animals'] = $animals;
        $data['timeslots'] = $timeslots;

        return view('pages.admin.vet-requests.show')->with(compact("data"));
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
        $vetRequest = VetRequest::find($id);
        $vetRequest->save();

        return redirect()->route('admins.vet-requests.show',  $id );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
