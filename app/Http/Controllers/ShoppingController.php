<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    //
    public function index(){
        $shoppings = Item::all();
        return view("index",compact("shoppings"));
    }
}
