<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Item;
class MenuController extends Controller
{
    public function storeMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Get the authenticated user
        $user = Auth::user();
        $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();

        // Save the image file
        $imagePath = $request->file('image')->storeAs('public/menu_images', $imageName);
        $items = Item::all();        // Create a new menu instance
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->image = $imagePath;
        $category = Category::all();

        // Associate the menu with the authenticated user's store
        $menu->store_id = $user->id; // Assign the store_id directly
        $menu->save();
    
        return redirect()->route('store.profile')->with(['user' => Auth::user(), 'category' => $category, 'items' => $items]);
    }
}