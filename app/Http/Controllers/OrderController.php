<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        return view('StoreProfile', compact('orders'));
    }
    public function trackOrder()
{
    $userId = Auth::user()->id;
    $orders = Order::where('user_id', $userId)->get();
    
    return view('TrackStoreOrder', compact('orders'));
}
public function edit($id)
    {
        // Retrieve the order
        $order = Order::findOrFail($id);

        // Add your logic here for editing the order
        
        // Return a JSON response or redirect to a view
    }

    public function destroy($id)
    {
        // Delete the order
        $response = Http::delete('/api/orders/' . $id);

        // Return a JSON response or redirect to a view
        return redirect()->back();
    }
}
