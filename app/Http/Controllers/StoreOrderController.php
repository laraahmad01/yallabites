<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class StoreOrderController extends Controller
{
    public function create($id,Request $request) {
        $store=Store::find($id);
        return view('createorder')->with('store',$store);
    }

    public function storeOrder($id, Request $request)
    {
        $obj = new Order();
        $obj->user_id = Auth::user()->id;
        $obj->store_id = $id;
        $obj->shipping_address = $request->input('shipping_address');
        $obj->billing_address = $request->input('billing_address');
        $obj->payment_method = $request->input('payment_method');
        $obj->status = 'pending'; // Set the status to 'pending'

    
        // If the payment method is online, you could also process the payment here
    
        $obj->save();
       
        return redirect()->route('showorder', $obj->id);
    }
    
    public function showOrders()
{
    $orders = Order::where('user_id', Auth::user()->id)->get();
  

    return view('showorder', ['orders' => $orders]);
}
// in your OrderController

public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('showorder')
                     ->with('success', 'Order has been deleted successfully');
}


public function track($id)
{
    // Retrieve order data from the database or API based on the provided ID
    $order = Order::findOrFail($id);

    // Pass the order data to a view
    return view('trackorder', compact('order'));
}

   // OrderController.php

/*public function createOrder(Request $request) {
    // Validate the input data
    $validated = $request->validate([
        'shipping_address' => 'required|string|max:255',
        'billing_address' => 'required|string|max:255',
        'payment_method' => 'required|string|in:online,cash_on_delivery',
     
    ]);

    // Calculate the total price of the order
    $items = Store::findOrFail($validated['itemId']);
    $totalPrice = $items->price * $validated['quantity'];

    // Create a new order record in the database
    $order = new Order();
    $order->user_id = auth()->user()->id;
    $order->store_id = $validated['store_id'];
   
    $order->payment_method = $validated['payment_method'];
    $order->shipping_address = $validated['shipping_address'];
    $order->billing_address = $validated['billing_address'];
    $order->save();

    // If the user chose to pay online, generate a payment request and redirect them to the payment page
    if ($validated['payment_method'] === 'online') {
        $paymentGateway = new StripePaymentGateway();
        $paymentGateway->initiatePayment($totalPrice);
        return redirect()->to($paymentGateway->getPaymentUrl());
    } else {
        // If the user chose cash on delivery, display a confirmation message
       // return view('ordersconfirmation', ['order' => $order]);
       return "ok";
    }
}

// StripePaymentGateway.php


        // Use the Stripe API to create a payment request
        
            public function initiatePayment($amount) {
            // Use the Stripe API to create a payment request
            $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $amount * 100,
            'currency' => 'usd',
            ]);
            $this->paymentIntentId = $paymentIntent->id;
            }
            public function getPaymentUrl() {
                // Return the URL of the payment page, which includes the payment intent ID
                return 'https://checkout.stripe.com/pay/' . $this->paymentIntentId;
            }
            
            // You can also implement methods to handle webhooks and confirm the payment when it's completed
            // This would involve updating the order record in the database and notifying the user of the payment status
            

    
   /* public function store(Request $request, Store $store)
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
    }*/
}

