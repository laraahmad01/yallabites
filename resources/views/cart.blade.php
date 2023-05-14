@extends('layouts.app')

@section('content')
    <title>Cart</title>

    <h1>Cart</h1>

    @if (count($cartItems) > 0)

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->item->name }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>{{ $cartItem->item->price }}</td>
                        <td>{{ $cartItem->quantity * $cartItem->item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>Total Quantity: {{ $totalQuantity }}</p>
        <p>Total Price: {{ $totalPrice }}</p>

        <form action="{{ route('cart.submit') }}" method="POST">
            @csrf
            <button type="submit">Submit Cart</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection
