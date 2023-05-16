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

    $items = new Item();
    $items->menu_id = $menu->id; // Assign the retrieved menu ID

    $items->category_id = $request->category;
    $items->name = $request->name;
    $items->price = $request->price;
    $items->calories = $request->calories;
    $items->description = $request->description;
    $items->image = $imagePath;
    $items->save();
    // Redirect back or to a success page
    return view('StoreProfile', compact('category', 'items'));
}
public function edit($id)
    {
        // Find the item by its ID
        $item = Item::findOrFail($id);

        // Return the view for editing the item
        return view('store.profile', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'calories' => 'required|numeric',
            'description' => 'required',
        ]);

        // Find the item by its ID
        $item = Item::findOrFail($id);

        // Update the item with the new data
        $item->name = $request->name;
        $item->price = $request->price;
        $item->calories = $request->calories;
        $item->description = $request->description;
        // Save the updated item
        $item->save();

        // Redirect back to the profile page or a success page
        return redirect()->route('store.profile');
    }

    public function destroy($id)
    {
        // Find the item by its ID
        $items = Item::findOrFail($id);

        // Delete the item
        $items->delete();

        // Redirect back to the profile page or a success page
        return redirect()->route('store.profile');
    }
}