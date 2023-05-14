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
        $userId = Auth::id();
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');

        // Get the user's cart
        $cart = Cart::where('user_id', $userId)->first();

        // If the user doesn't have a cart, create one
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $userId,
            ]);
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

        return response()->json(['message' => 'Item added to cart successfully']);
    }

    public function showCart()
    {
        $userId = Auth::id();

        // Get the user's cart and cart items
        $cart = Cart::with('cartItems.item')->where('user_id', $userId)->first();

        // If the user doesn't have a cart, return an empty cart
        if (!$cart) {
            $cartItems = [];
            $totalQuantity = 0;
            $totalPrice = 0;
        } else {
            $cartItems = $cart->cartItems;
            $totalQuantity = $cartItems->sum('quantity');
            $totalPrice = $cartItems->sum(function ($cartItem) {
                return  $cartItem->item->price;
            });
        }

        return view('cart', compact('cartItems', 'totalQuantity', 'totalPrice'));
    }
}
