@extends ('layouts.app')
@section('content')

<title>My Basket</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/cart.css') }}" rel="stylesheet">

<div class="body2">
    <div class="wrapper2">
		<h1>Shopping Cart</h1>
		<div class="project">
			<div class="shop">
            @foreach ($cartItems as $cartItem)
				<div class="box">
					<img src="{{$cartItem->item->image}}">
					<div class="content2">
						<h3>{{ $cartItem->item->name }}</h3>
                        <small>{{ $cartItem->item->menu->store->name }}</small>
						<h4>Price: ${{$cartItem->item->price}}</h4>
						<p class="unit">Quantity: <input name="" value="2"></p>
						<p class="btn-area"><i aria-hidden="true" class="fa fa-trash"></i> <span class="btn2">Remove</span></p>
					</div>
				</div>
            @endforeach
		
				
			</div>
			<div class="right-bar">
				<p><span>Subtotal</span> <span>{{ $totalPrice }}</span></p>
				<hr>
				<p><span>Tax (5%)</span> <span>{{ $totalPrice*0.5 }}</span></p>
				<hr>
				<p><span>Shipping</span> <span>$15</span></p>
				<hr>
				<p><span>Total</span> <span>{{ $totalPrice*0.5 + 15 }}</span></p><a href="{{ route('store.orders.create', ['id' => $store->id]) }}"><i class="fa fa-shopping-cart"></i>Checkout</a>
			</div>
		</div>
	</div>


@endsection