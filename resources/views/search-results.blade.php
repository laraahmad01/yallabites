@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>

    @if ($items->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Store</th>
                    <th>Cuisine</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->menu->store->name }}</td>
                        <td>{{ $item->menu->store->cuisine->name }}</td>
                        <td>{{ $item->category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No items found.</p>
    @endif
@endsection
