@extends('layouts.app')

@section('content')
<div class="container">
<h1>Order Confirmed</h1>
<p>Thank you for your order! Your product will be shipped to the following address:</p>
<p>{{ $order->shipping_address }}</p>
<p>Please keep the following amount ready to pay to the delivery agent: ${{ $order->total_price }}</p>
</div>
@endsection