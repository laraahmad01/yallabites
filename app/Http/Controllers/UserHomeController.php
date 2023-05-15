<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuisine;
use App\Models\Store;
use App\Models\Review;
use App\Models\Item;

class UserHomeController extends Controller
{
    public function showHome()
{
    $cuisines = Cuisine::all();
    $stores = Store::all();
    $reviews = Review::all();
    $items= Item::all();
    return view('userhome', compact('cuisines','stores','reviews','items'));
}

}
