@extends('layouts.app')
@section('content')
<style>
/* Layout */
.container {
    display: flex;
    flex-wrap: wrap;
}

/* Menus */
.menu-list {
    flex: 1;
    margin-right: 2rem;
}

.menu-list h2 {
    margin-bottom: 1rem;
}

.menu-list ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-list li {
    margin-bottom: 0.5rem;
}

.menu-list li a {
    color: #333;
    text-decoration: none;
}

/* Reviews */
.review-list {
    flex: 1;
}

.review-list h2 {
    margin-bottom: 1rem;
}

.review-list > div {
    margin-bottom: 2rem;
}

.review-list p {
    margin-bottom: 0.5rem;
}

.review-list hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: none;
    height: 1px;
    background-color: #ccc;
}

.review-list form {
    display: inline-block;
}
.review-list form button {
    margin-left: 0.5rem;
}

/* Add Review and Order links */
.links {
    margin-top: 1rem;
}

.links a {
    display: inline-block;
    margin-right: 1rem;
    padding: 0.5rem 1rem;
    color: #fff;
    background-color: #007bff;
    border-radius: 0.25rem;
    text-decoration: none;
}

.links a:hover {
    background-color: #0069d9;
}

    </style>
    
    <div class="container">
        <div class="menu-list">
            <h2>{{ $store->name }} Menus</h2>
            @if (count($menus) > 0)
                <ul>
                    @foreach ($menus as $menu)
                        <li><a href="{{ route('stores.menu', ['storeId' => $store->id, 'menuId' => $menu->id]) }}">{{ $menu->name }}</a></li>
                    @endforeach
                </ul>
            @else
                <p>No menus found for this store.</p>
            @endif
        </div>
        <div class="review-list">
            <h2>Reviews</h2>
            @foreach ($rev as $review)
                <div>
                    <p>{{ $review->description }}</p>
                    <p>Rating: {{ $review->rating }}</p>
                    <p>Written by: {{ $review->user->name }}</p>
                    @if (auth()->check() && $review->user_id == auth()->user()->id)
                        <form action="{{ route('reviews.destroy', ['id' => $review->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                    <hr>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container links">
        <a href="{{ Route('reviews',['id'=>$store->id])}}">Add Review</a>
        <a href="{{ Route('store.orders.create',['id'=>$store->id])}}">Order</a>
    </div>

@endsection
