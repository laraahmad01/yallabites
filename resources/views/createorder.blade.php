@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Checkout</h1>

        <form method="POST" action="{{Route('store.orders.store',['id'=>$store->id])}}">

            @csrf

            <h2>Shipping Information</h2>
           
            <div class="form-group">
                <label for="shipping_address">Address</label>
                <textarea class="form-control" id="shipping_address" name="shipping_address" required></textarea>
            </div>

            <hr>

            <h2>Billing Information</h2>
           
            <div class="form-group">
                <label for="billing_address">Address</label>
                <textarea class="form-control" id="billing_address" name="billing_address" required></textarea>
            </div>

            <hr>

            <h2>Payment Information</h2>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="">Select Payment Method</option>
                    <option value="online">Online Payment</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                </select>
            </div>

            <div id="online-payment">
                <h3>Online Payment</h3>

                <!-- Integrate Stripe or PayPal payment gateway here -->
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>

    <script>
        // Show or hide online payment fields based on user selection
        const onlinePayment = document.querySelector('#online-payment');

        document.querySelector('#payment_method').addEventListener('change', () => {
            if (document.querySelector('#payment_method').value === 'online') {
                onlinePayment.style.display = 'block';
            } else {
                onlinePayment.style.display = 'none';
            }
        });
    </script>
@endsection
