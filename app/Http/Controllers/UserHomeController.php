<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuisine;

class UserHomeController extends Controller
{
    public function showHome()
{
    $cuisines = Cuisine::all();

    return view('userhome', compact('cuisines'));
}
}
