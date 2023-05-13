<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Store;


class ReviewsController extends Controller
{
  /*  public function create(Request $request)
{
  
    $review = new Review;
    $user_id = Auth::user()->id;
   
    $review->user_id = $request->$user_id;
    $review->cook_id = $request->$cook_id;
    $review->rating = $request->$rating;
    $review->description = $request->description;

        

    $review->save();

    return "ok";
}*/

/*public function review()
{
    return view('reviews');
}*/


public function create(Request $request, $store_id)
{
    $store = Store::findOrFail($store_id);

    

    $validatedData = $request->validate([
        'description' => 'required|string',
        'rating' => 'required|numeric|min:1|max:5'
    ]);

    $review = new Review();
    $review->user_id = auth()->user()->id;
    $review->store_id = $store->id;
    $review->description = $request->input('description');
    $review->rating = $request->input('rating');
    $review->save();

    return "ok";
}

public function review($store_id)
{
    $store = Store::findOrFail($store_id);
    $reviews = $store->reviews()->orderBy('created_at', 'desc')->paginate(10);

    return view('reviews', ['store_id' => $store_id]);}
}