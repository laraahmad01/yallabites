<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // You can add any necessary data for the order creation form here
        return view('createorder');
    }

    public function store(Request $request)
    {
        // Validate the form data here
        
        // Create a new order record in the database
        $order = new Order;
        $order->user_id = $request->input('user_id');
        $order->store_id = $request->input('store_id');
        $order->address = $request->input('address');
        $order->payment_option = $request->input('payment_option');
        $order->total = $request->input('total');
        $order->delivery_charge = $request->input('delivery_charge');
        $order->subtotal = $request->input('subtotal');
        $order->save();
        // Redirect to the order index page with a success message
        return "ok";
    }
}

