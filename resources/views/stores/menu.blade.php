@extends('layouts.app')

@section('content')
    <h2>{{ $store->name }} - {{ $menu->name }} Menu</h2>

    @if (count($items) > 0)
        <ul>
            @foreach ($items as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No items found in this menu.</p>
    @endif
@endsection
