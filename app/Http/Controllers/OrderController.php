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
