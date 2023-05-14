@extends('layouts.app')

@section('content')

<style>
  .my-orders-container {
    margin: 30px auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .my-orders-heading {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
  }

  .my-orders-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  .my-orders-table thead {
    background-color: #222;
    color: #fff;
  }

  .my-orders-table th {
    padding: 10px;
  }

  .my-orders-table td {
    padding: 10px;
    border: 1px solid #999;
  }

  .my-orders-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .my-orders-btn-primary {
    background-color: #5d6d7e;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-transform: uppercase;
    font-size: 14px;
    transition: all 0.3s ease;
  }

  .my-orders-btn-primary:hover {
    background-color: #4c5b6a;
    cursor: pointer;
  }

  .my-orders-btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-transform: uppercase;
    font-size: 14px;
    transition: all 0.3s ease;
  }

  .my-orders-btn-danger:hover {
    background-color: #c82333;
    cursor: pointer;
  }
</style>

<div class="my-orders-container">
  <h1 class="my-orders-heading">My Orders</h1>

  @if(count($orders) > 0)
    <table class="my-orders-table">
      <thead>
        <tr>
          <th>Shipping Address</th>
          <th>Billing Address</th>
          <th>Payment Method</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
          <tr>
            <td>{{ $order->shipping_address }}</td>
            <td>{{ $order->billing_address }}</td>
            <td>{{ $order->payment_method }}</td>
            <td>
              <form method="POST" action="{{ route('orders.destroy', ['order' => $order->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="my-orders-btn-danger">Remove Order</button>
              </form>
            </td>
            <td>
              <a href="{{ route('orders.track', ['id' => $order->id]) }}" class="my-orders-btn-primary">Track Order</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No orders found.</p>
  @endif
</div>

