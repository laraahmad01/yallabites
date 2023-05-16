@extends('StoreProfile')
@section('content')

<div class="col-lg-6 grid-margin stretch-card">
    
    <div class="card">
        <h1>Your Store Orders Are Bellow</h1>
        <div class="card-body">
            <h4 class="card-title">Track Orders</h4>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Store ID</th>
                            <th>Store Name</th>
                            <th>Address</th>
                            <th>Payment Option</th>
                            <th>Total</th>
                            <th>Delivery Charge</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->store->id }}</td>
                            <td>{{ $order->store->name }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->payment_option }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->delivery_charge }}</td>
                            <td>{{ $order->subtotal }}</td>
                            <td>
                                <a href="{{ route('editorder', ['id' => $order->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('deleteplz', ['id' => $order->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection