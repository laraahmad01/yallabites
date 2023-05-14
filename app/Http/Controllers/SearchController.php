<?php

namespace App\Http\Controllers;
use App\Models\Store;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $stores = Store::where('name', 'LIKE', "%$query%")->get();
    
        return view('stores.show_menu', compact('stores', 'query'));
    }
    

}
