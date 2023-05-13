@extends('layouts.app')

@section('content')
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
@endsection
