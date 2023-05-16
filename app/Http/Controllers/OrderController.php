<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class StoreOrderController extends Controller
{
    public function create($id, Request $request)
    {
        $store = Store::find($id);
        return view('createorder', compact('store'));
    }

    public function storeOrder($id, Request $request)
    {
        $obj = new Order();
        $obj->user_id = Auth::user()->id;
        $obj->store_id = $id;
        $obj->cart_id = $id;
        $obj->cart_items_id = $id;
        $obj->shipping_address = $request->input('shipping_address');
        $obj->billing_address = $request->input('billing_address');
        $obj->payment_method = $request->input('payment_method');
        $obj->status = 'pending'; // Set the status to 'pending'

        if ($request->input('payment_method') === 'online') {
            // Set up your Stripe API credentials
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            // Create a charge with the necessary details
            $charge = Charge::create([
                'amount' => $obj->total_price * 100, // Stripe requires the amount in cents
                'currency' => 'usd', // Replace with your desired currency
                'source' => $request->input('stripe_token'), // The Stripe token obtained from the client-side
                'description' => 'Payment for Order #' . $obj->id, // Replace with your desired description
            ]);

            // Check if the charge was successful
            if ($charge->status === 'succeeded') {
                // Payment was successful, update the order status
                $obj->status = 'paid';
                $obj->save();
            } else {
                // Payment failed, handle the error
                return redirect()->back()->with('error', 'Payment failed. Please try again.');
            }
        }

        // If the payment method is online, you could also process the payment here

        $obj->save();
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        // After successful checkout
        $cart->cartItem()->delete();

        return redirect()->route('showorder', $obj->id);
    }

    public function showOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('showorder', ['orders' => $orders]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('showorder')->with('success', 'Order has been deleted successfully');
    }

    public function track($id)
    {
        // Retrieve order data from the database or API based on the provided ID
        $order = Order::findOrFail($id);

        // Pass the order data to a view
        return view('trackorder', compact('order'));
    }
}
