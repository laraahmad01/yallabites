@extends('layouts.app')

@section('content')

<style>
.card {
  background-color: #f8f9fa;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  max-width: 600px;
  margin: 0 auto;
}

.card h1 {
  font-size: 36px;
  margin-bottom: 20px;
  color: #333;
}

.card p {
  font-size: 18px;
  margin-bottom: 10px;
  color: #666;
}

.card .order-id {
  font-weight: bold;
  color: #007bff;
}

.card .status {
  color: #28a745;
}
    </style>
     <div class="card">
        <div class="card-body">
            <h1>Track Order</h1>

            @if ($order)
                <p>Order ID: {{ $order->id }}</p>
                <p>Status: {{ $order->status }}</p>
            @else
                <p>No order information found.</p>
            @endif
        </div>
    </div>


@endsection
