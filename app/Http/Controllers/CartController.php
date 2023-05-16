<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Item;

class CartController extends Controller
{
    public function addItem(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $userId = Auth::id();
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');

        // Get the user's cart
        $cart = Cart::firstOrNew(['user_id' => $userId]);

        // If the cart doesn't exist, save it
        if (!$cart->exists) {
            $cart->save();
        }
        
        // Check if the item already exists in the cart
        $existingCartItem = CartItem::where('cart_id', $cart->id)
            ->where('item_id', $itemId)
            ->first();

        if ($existingCartItem) {
            // If the item already exists, update the quantity
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
        } else {
            // If the item doesn't exist, create a new cart item
            CartItem::create([
                'cart_id' => $cart->id,
                'item_id' => $itemId,
                'quantity' => $quantity,
            ]);
        }

        return back(); // Redirect back to the previous page
    }

    public function showCart()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    
    $userId = Auth::id();

    // Get the user's cart and cart items with related item and menu
    $cart = Cart::with('cartItems.item.menu.store')->where('user_id', $userId)->first();

    // If the user doesn't have a cart or there are no items in the cart, display "no items"
    if (!$cart || $cart->cartItems->isEmpty()) {
        $cartItems = collect();
        $totalQuantity = 0;
        $totalPrice = 0;
        $store = null;
        $noItems = true;
    } else {
        $cartItems = $cart->cartItems;
        $totalQuantity = $cartItems->sum('quantity');
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return  $cartItem->item->price;
        });
        $store = $cartItems->first()->item->menu->store;
        $noItems = false;
    }

    return view('cart', compact('cartItems', 'totalQuantity', 'totalPrice', 'store', 'noItems'));
}

    

    public function deleteItem($itemId)
    {
        $userId = Auth::id();
    
        // Get the user's cart
        $cart = Cart::where('user_id', $userId)->first();
    
        // If the cart exists, delete the item from the cart_items table
        if ($cart) {
            CartItem::where('cart_id', $cart->id)
                ->where('id', $itemId)
                ->delete();
        }
    
        return back(); // Redirect back to the previous page
    }
    

}
