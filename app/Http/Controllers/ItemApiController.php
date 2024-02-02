<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::all();
        return response()->json($items);
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

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        if(Category::find($request->category_id)){
            $item->category_id = $request->category_id;
        }
        else{
            return response()->json('Category_id not found');
        }
        $item->expdate = $request->expdate;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newimage = "gallery_" . uniqid() . "." . $image->extension();
            $image->storeAs('public/gallery', $newimage);
            $item->image = `http://127.0.0.1:8000/storage/gallery/{$newimage}`;
        }
        $item->save();
        return response()->json($item);
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
        $item = Item::find($id);
        if ($item) {
            return response()->json($item);
        }
        return response()->json('Not found :<');
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
        $item = Item::find($id);
        if ($item) {
            return response()->json($item->name + 'was found Sir');
        }
        return response()->json('It was not found :<');
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
        $item = Item::find($id);
        if ($item) {
            if ($request->has('name')) {
                $item->name = $request->name;
            }
            if ($request->has('price')) {
                $item->price = $request->price;
            }
            if ($request->has('category_id')) {
                if(Category::find($request->category_id)){
                    $item->category_id = $request->category_id;
                }
                else{
                    return response()->json('Category_id not found');
                }
            }
            if ($request->has('expdate')) {
                $item->expdate = $request->expdate;
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $newimage = "gallery_" . uniqid() . "." . $image->extension();
                $image->storeAs('public/gallery', $newimage);
                $item->image = `http://127.0.0.1:8000/storage/gallery/{$newimage}`;
            }
            $item->update();
            return response()->json($item);
        }
        return response()->json('Update failed');
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
        $item = Item::find($id);
        if ($item) {
            $item->delete();
            return response()->json('Deleted successfully');
        }
        return response()->json('Delete not success');
    }
}
