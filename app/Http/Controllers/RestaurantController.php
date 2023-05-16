<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuisine;

class RestaurantController extends Controller
{
    public function create(Request $request)
    {
        $cuisines = Cuisine::all();
        return view('StartingStore',compact('cuisines'));
    }
}
