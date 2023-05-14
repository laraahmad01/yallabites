@extends('layouts.app')

@section('content')
    <h2>{{ $store->name }} Menus</h2>
<h2><a href="{{ Route('reviews',['id'=>$store->id])}}">add review</a>

    @if (count($menus) > 0)
        <ul>
            @foreach ($menus as $menu)
                <li><a href="{{ route('stores.menu', ['storeId' => $store->id, 'menuId' => $menu->id]) }}">{{ $menu->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No menus found for this store.</p>
    @endif
   
    @foreach ($rev as $review)
    <div>
        <p>{{ $review->description }}</p>
        <p>Rating: {{ $review->rating }}</p>
        <p>Written by: {{ $review->user->name }}</p>
        <form action="{{ route('reviews.destroy', ['id' => $review->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

        <hr>
    </div>
@endforeach

@endsection
