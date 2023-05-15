<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
        $obj->shipping_address = $request->input('shipping_address');
        $obj->billing_address = $request->input('billing_address');
        $obj->payment_method = $request->input('payment_method');
    
        // If the payment method is online, you could also process the payment here
    
        $obj->save();
       
        return redirect()->route('showorder', $obj->id);
    }
    
    public function showOrders()
{
    $orders = Order::where('user_id', Auth::user()->id)->get();
    return view('showorder', ['orders' => $orders]);
}

}

