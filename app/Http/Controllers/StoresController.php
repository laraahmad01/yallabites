<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Menu;
use App\Models\Item;
use App\Models\Review;
use App\Models\Cart;

class StoresController extends Controller
{
    public function index()
{
    $stores = Store::all();
    return view('stores.index', compact('stores'));
}

public function create(Request $request)
    {
   
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $filename, 'public');

        $store = new Store;
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->image_path = $path;
    $store->save();

    // redirect to the newly created store's page
    return redirect()->route('stores.show', $store->id);
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
}
