@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/itemslist.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <div class="product-container">
        @if (count($products) > 0)
            <div class="product-cards">
                @foreach ($products as $product)
                    <div class="product-card">
                        <div class="product-tumb">
                            <a href="{{ route('stores.item_details', ['storeId' => $store->id, 'menuId' => $menu->id, 'itemId' => $product->id]) }}">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="product-details">
                            <span class="product-catagory">{{ $product->category->name }}</span>
                            <h4>
                                <a href="{{ route('stores.item_details', ['storeId' => $store->id, 'menuId' => $menu->id, 'itemId' => $product->id]) }}">{{ $product->name }}</a></h4>
<p>{{ $product->description }}</p>
<div class="product-bottom-details">
<div class="product-price">
<h4>{{ $product->price }}</h4>
</div>
<div class="product-links">
<form action="{{ route('cart.add') }}" method="POST">
@csrf
<input type="hidden" name="item_id" value="{{ $product->id }}">
<button type="submit" class="btn btn-primary">Add to Cart</button>
</form>
</div>
</div>
</div>
</div>
@endforeach
</div>
@else
<p>No items found.</p>
@endif
</div>
@endsection
