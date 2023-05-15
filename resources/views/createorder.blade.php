@extends('layouts.app')

@section('content')

<style>
/* Style for Checkout Form */

.container {
  margin: 0 auto;
  max-width: 800px;
  padding: 40px;
}

h1 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 40px;
  text-align: center;
}

h2 {
  font-size: 24px;
  font-weight: bold;
  margin-top: 40px;
}

form {
  margin-top: 40px;
}

label {
  display: block;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

textarea,
select {
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  padding: 10px;
  width: 100%;
}

button[type="submit"] {
  background-color: #4CAF50;
  border: none;
  border-radius: 5px;
  color: white;
  cursor: pointer;
  font-size: 18px;
  margin-top: 40px;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  width: 100%;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

#online-payment {
  display: none;
}

#online-payment h3 {
  font-size: 24px;
  font-weight: bold;
  margin-top: 40px;
}

    </style>
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
           
            <h2>paypal</h2>
            <h2>apple pay</h2>
            

              

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
