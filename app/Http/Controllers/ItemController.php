<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Item;
use App\Models\Menu;
use App\Models\Category;
class ItemController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'category' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
        'calories' => 'required|numeric',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Get the authenticated user
    $user = Auth::user();

    $category = Category::all();
    $category = Category::all();
    $menu = Menu::where('id', $user->id)->first(); // Retrieve the menu associated with the authenticated user

    
    // Save the image file
    $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
    $imagePath = $request->file('image')->storeAs('public/menu_images', $imageName);

    $item = new Item();
    $item->menu_id = $menu->id; // Assign the retrieved menu ID

    $item->category_id = $request->category;
    $item->name = $request->name;
    $item->price = $request->price;
    $item->calories = $request->calories;
    $item->description = $request->description;
    $item->image = $imagePath;
    $item->save();
    // Redirect back or to a success page
    return view('StoreProfile', compact('category'));
}
}