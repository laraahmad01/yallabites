@extends('layouts.app')

@section('content')
    <h1>List of Stores</h1>
    <ul>
        @foreach ($stores as $store)
            <li>
                <a href="{{ route('stores.menu', $store->id) }}">
                    {{ $store->name }} - {{ $store->description }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
