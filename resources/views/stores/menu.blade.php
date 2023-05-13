@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/itemslist.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <h2>{{ $store->name }} - {{ $menu->name }} Menu</h2>
    <div class="product-container">
    @if (count($items) > 0)
        <div class="product-cards">
            @foreach ($items as $item)
                <div class="product-card">
                    
                    <div class="product-tumb">
                    <a href="{{ route('stores.item_details',['storeId' => $store->id, 'menuId' => $menu->id, 'itemId' => $item->id]) }}">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}">
                    </a>
                    </div>
                    <div class="product-details">
                        <span class="product-catagory">{{ $item->category->name }}</span>
                        <h4><a href="{{ route('stores.item_details', ['storeId' => $store->id, 'menuId' => $menu->id, 'itemId' => $item->id]) }}">{{ $item->name }}</a></h4>
                        <p>{{ $item->description }}</p>
                        <div class="product-bottom-details">
                            <div class="product-price"><h4>{{ $item->price }}</h4></div>
                            <div class="product-links">
                                <a href=""><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No items found in this menu.</p>
    @endif
</div>
@endsection
