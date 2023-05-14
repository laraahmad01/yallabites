<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function review($id){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $store=Store::find($id);
        return view('stores.addReviews')->with('store',$store);
        }

    


public function addReview($id, Request $request)
{
   
    
    $obj = new Review();
    $obj->description = $request->description;
    $obj->rating = $request->rating;
    $obj->user_id = Auth::user()->id;
    $obj->store_id = $id;
    $obj->save();
    
    return redirect(Route('stores.show_menu', ['storeId' => $id])); 
}


           public function destroy($id)
           {
               $review = Review::findOrFail($id);
               $review->delete();
           
               return redirect()->back()->with('success', 'Review deleted successfully.');
           }
           

    }
