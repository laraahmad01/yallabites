<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
public function searchItems(Request $request)
{
    $query = $request->input('query');

    $items = Item::where('name', 'LIKE', "%{$query}%")
    ->orWhereHas('menu.store', function ($query) use ($request) {
        $query->where('name', 'LIKE', "%{$request->input('query')}%");
    })
    ->orWhereHas('category', function ($query) use ($request) {
        $query->where('name', 'LIKE', "%{$request->input('query')}%");
    })
    ->orWhere('price', 'LIKE', "%{$query}%")
    ->orWhereHas('menu.store.location', function ($query) use ($request) {
        $query->where('street', 'LIKE', "%{$request->input('query')}%")
            ->orWhere('city', 'LIKE', "%{$request->input('query')}%")
            ->orWhere('state', 'LIKE', "%{$request->input('query')}%");
    })
    ->orWhere('description', 'LIKE', "%{$query}%")
    ->get();




    return view('search-results', compact('items'));
}

    

}
