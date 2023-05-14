<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Store;

use Illuminate\Support\Facades\Auth;

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





class ReviewsController extends Controller
{
    public function review($id){
        $store=Store::find($id);
        return view('stores.addReviews')->with('store',$store);
        }



        public function addReview($id,Request $request){
        $obj=new Review();
        $obj->description=$request->description;
        $obj->rating=$request->rating;
       
        $obj->user_id=Auth::user()->id;
             $obj->store_id=$id;
        $obj->save();
       // return redirect(Route('stores.show_menu',['id'=>$id]));
       return redirect(Route('stores.show_menu',['storeId'=>$id])); 
           }

           public function destroy($id)
           {
               $review = Review::findOrFail($id);
               $review->delete();
           
               return redirect()->back()->with('success', 'Review deleted successfully.');
           }
           

    }


/*public function showReviewForm($id)
{
    $store = Store::find($id);
    return view('reviews.create', compact('store'));
}

public function storeReview(Request $request, $id)
{
    $validatedData = $request->validate([
        'rating' => 'required',
        'comment' => 'required',
    ]);

    $review = new StoreReview;
    $review->store_id = $id;
    $review->user_id = auth()->user()->id;
    $review->rating = $validatedData['rating'];
    $review->comment = $validatedData['comment'];
    $review->save();

    return redirect('/stores/'.$id)->with('success', 'Review added successfully!');
}
}*/