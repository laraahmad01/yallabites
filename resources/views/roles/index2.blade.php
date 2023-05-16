@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">

<div class="fontclass">
    <div class="table">
        <div class="table__body">
            <div class="table__row table__heading">
                <div style="width:25%" class="table__cell">Store Name</div>
                <div style="width:45%" class="table__cell">Description</div>
                <div style="width:30%" class="table__cell">Actions</div>
            </div>
            @foreach ($stores as $store)
            <div class="table__row">
                <div style="width:25%" class="table__cell">{{ $store->name }}</div>
                <div style="width:45%" class="table__cell">{{ $store->description }}</div>
                <div style="width:30%" class="table__cell">
                    <div class="buttons">
                        <form action="{{ route('roles.acceptStore', $store->id) }}" method="POST"
                            class="store-action-form">
                            @csrf
                            <button class="button button--primary buttons__comprar">Accept</button>
                        </form>
                        <form action="{{ route('roles.rejectStore', $store->id) }}" method="POST"
                            class="store-action-form">
                            @csrf
                            <button class="button button--danger buttons__venta">Reject</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @if (count($stores) == 0)
            <div class="table__row">
                <div class="table__cell" colspan="3">
                    <a href="{{ route('stores.create') }}" class="btn btn-primary">Add Store</a>
                    <p>No store requests found.</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
