<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Menu;

class StoresController extends Controller
{
    public function index()
{
    $stores = Store::all();
    return view('stores.index', compact('stores'));
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
    

}
