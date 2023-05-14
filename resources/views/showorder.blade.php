@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Orders</h1>

        <table class="table">
            <thead>
                <tr>
                   
                    <th>Shipping Address</th>
                    <th>Billing Address</th>
                    <th>Payment Method</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                 
                        <td>{{ $order->shipping_address }}</td>
                        <td>{{ $order->billing_address }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
