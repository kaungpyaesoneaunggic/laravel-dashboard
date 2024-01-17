<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;

class ItemController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth',['except' => ['index','show']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::all();
        return view("item.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view("item.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        //
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->expdate = $request->expdate;
        $item->save();
        return redirect()->route("item.index")->with("success","Item Successfully Created");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        return view("item.detail", compact("item"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $categories = Category::all();
        return view("item.edit", compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->update();
        return redirect()->route('item.index')->with('update','Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        if($item){
            $item->delete();
            return redirect()->route('item.index')->with('delete','Item Deleted successfully');
        }
    }
}
