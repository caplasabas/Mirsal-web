<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Animal;
use App\Model\Size;
use App\Model\TimeSlot;
use App\Model\Duration;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $data['products'] = $products;

        return view('pages.admin.products.index')->with(compact('data'));
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
        $product = Product::find($id);
        $data = array();

        $sizes = Size::all();
        $animals = Animal::all();
        $timeslots = TimeSlot::all();
        $durations = Duration::all();
        $data['product'] = $product;
        $data['sizes'] = $sizes;
        $data['animals'] = $animals;
        $data['timeslots'] = $timeslots;
        $data['durations'] = $durations;

        return view('pages.admin.products.show')->with(compact("data"));
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
        $product = Product::find($id);

        $product->title = $request->title;
        $product->type = $request->type;
        $product->duration_id = $request->duration_id;

        $product->save();

        return redirect()->route('admins.products.show',  $id );
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

    public function accept($id)
    {
        $product = Product::find($id);
        $product->vip_status = "ACCEPTED";
        $product->save();

        return redirect()->route('admins.products.show',  $id );
    }
}
