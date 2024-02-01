<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use App\Http\Requests\StoreShoppingRequest;
use App\Http\Requests\UpdateShoppingRequest;
use App\Models\Item;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shoppings = Item::all();
        return view("index",compact("shoppings"));
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
     * @param  \App\Http\Requests\StoreShoppingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoppingRequest $request, Shopping $shopping)
    {
        //
        
        $shopping->name = $request->name;
            $shopping->price = $request->price;
            $shopping->category_id = $request->category_id;
            $shopping->expdate = $request->expdate;
            if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newimage = "gallery_" . uniqid() . "." . $image->extension();
            $image->storeAs('public/gallery', $newimage);
            $shopping->image = $newimage;
            }
            $shopping->save();
            return $shopping;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping $shopping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopping $shopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingRequest  $request
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoppingRequest $request, Shopping $shopping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping $shopping)
    {
        //
    }
}
