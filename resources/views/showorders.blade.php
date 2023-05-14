@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Order Details
        </div>
        <div class="card-body">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Order Address:</strong> {{ $order->address }}</p>
            <p><strong>Payment Option:</strong> {{ $order->payment_option }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('m/d/Y h:i A') }}</p>
            <p><strong>Delivery Charge:</strong> ${{ $order->delivery_charge }}</p>
            <p><strong>Subtotal:</strong> ${{ $order->subtotal }}</p>
            <p><strong>Total:</strong> ${{ $order->total }}</p>
            <p><strong>Items:</strong></p>
            <ul>
                @foreach ($order->items as $item)
                    <li>{{ $item->name }} - ${{ $item->price }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
