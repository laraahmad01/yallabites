<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use App\Models\Store;
use App\Models\Location;
use App\Models\Cuisine;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StoresController extends Controller
{
    public function index()
{
    $stores = Store::all();
    return view('stores.index', compact('stores'));
}

public function storeNewStore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'postal_code' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'your_email' => 'required|string|email|max:255',
        'cuisine' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ]);

    // Save location
    $location = new Location;
    $location->street = $request->street;
    $location->city = $request->city;
    $location->state = $request->state;
    $location->postal_code = $request->postal_code;
    $location->country = $request->country;
    $location->code = $request->code;
    $location->phone = $request->phone;
    $location->your_email = $request->your_email;
    $location->save();

    // Save cuisine
    $cuisine = new Cuisine;
    $cuisine->name = $request->cuisine;
    $cuisine->save();

    // Save store
    $store = new Store;
    $store->name = $request->name;
    $store->location_id = $location->id;
    $store->cuisine_id = $cuisine->id;
    $store->description = $request->description;
    $store->is_accepted = false;

    if (Auth::check()) {
        $store->user_id = Auth::user()->id;
        $store->save();
    } else {
        return redirect()->route('home')->with('redirect_path', route('submit store'))->withInput($request->input());
    }

    $store->save();

    // Redirect to the waiting page
    return "okahyy";
}

public function store(){
    return view("store_waiting");
}

public function menu($storeId, $menuId)
{
    $store = Store::findOrFail($storeId);
    $menu = Menu::with('items')->findOrFail($menuId);
    $items = $menu->items;

    return view('stores.menu', compact('store', 'menu', 'items'));
}

    
    public function showMenu($storeId)
    {
        $store = Store::findOrFail($storeId);
        $menus = $store->menus;
    
        return view('stores.show_menu', compact('store', 'menus'));
    }
    
    public function showItemDetails($storeId, $menuId, $itemId)
{
    $store = Store::findOrFail($storeId);
    $menu = Menu::findOrFail($menuId);
    $item = Item::findOrFail($itemId);

    return view('stores.item_details', compact('store', 'menu', 'item'));
}

    
}
