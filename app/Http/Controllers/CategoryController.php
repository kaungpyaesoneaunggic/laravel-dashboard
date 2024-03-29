<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Item;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth',['except' => ['index','show']]);
    // }
    public function index()
    {
        //
        $categories = Category::all();
        return view("category.index", compact("categories"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with("success","New Category ceated Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view("category.detail", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view("category.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $category->name = $request->name;
        $category->update();
        return redirect()->route("category.index")->with("update","Category updated Successfully");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // //
        if($category){
            $category->delete();
            return redirect()->route('category.index')->with("delete","Category deleted Successfully");
        }
        return redirect()->route('category.index')->with("delete","Category Could not be Deleted");
    
        // if ($category->isDeletable()) {
        //     $category->delete();
        //     return redirect()->route("category.index")->with("delete","Successfully deleted");
        // } else {
        //     return redirect()->route("category.index")->with("delete","Cant delete This data is being used");
           
        // }
    }
    }
