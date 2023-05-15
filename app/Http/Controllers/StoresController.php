<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use App\Models\Store;
use App\Models\Location;
use App\Models\Cuisine;
use App\Models\Order;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Cart;

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
        $username= Auth::user()->name;
        return redirect()->route('addmenu');

    } else { 
        

        return redirect()->guest(route('login'))->intended(route('submit.store'))->withInput($request->input());
    }

    
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
        $rev = $store->reviews;
    
        return view('stores.show_menu', compact('store', 'menus', 'rev'));
    }
    
    public function showItemDetails($storeId, $menuId, $itemId)
{
    $store = Store::findOrFail($storeId);
    $menu = Menu::findOrFail($menuId);
    $item = Item::findOrFail($itemId);

    return view('stores.item_details', compact('store', 'menu', 'item'));
}


public function showProducts(Request $request)
{
    if ($request->has('items')) {
        $products = $request->items;
    } else {
        $products = Item::all();
    }
    $store = Store::first();
    $menu = $store->menus()->first();

    return view('products', compact('products', 'store', 'menu'));
}
}
