<?php

/*namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use Illuminate\Http\Request;

class StoreOrderController extends Controller
{
    public function create(Store $store)
    {
        return view('createorder');
    }
    
    public function store(Request $request, Store $store)
    {
        $validatedData = $request->validate([
            'address' => 'required|string',
            'payment_option' => 'required|in:online,on_delivery',
            'items' => 'required|array|min:1',
            'items.*' => 'required|exists:items,id',
        ]);
        
        $items = $store->items()->whereIn('id', $validatedData['items'])->get();
        $subtotal = $items->sum('price');
        $deliveryCharge = 10; // Set your delivery charge here
        $total = $subtotal + $deliveryCharge;
        
        $order = new Order([
            'address' => $validatedData['address'],
            'payment_option' => $validatedData['payment_option'],
            'subtotal' => $subtotal,
            'delivery_charge' => $deliveryCharge,
            'total' => $total,
        ]);
        
        $store->orders()->save($order);
        $order->items()->attach($validatedData['items']);
        
        return redirect()->route('showorders', ['store' => $store->id, 'order' => $order->id]);
    }
    
    public function show(Store $store, Order $order)
    {
        return view('showorders', ['store' => $store, 'order' => $order]);
    }
}*/

