@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">

<div class="fontclass">
    <div class="table">
  <div class="table__body">
    <div class="table__row table__heading">
      <div class="table__cell">Store ID</div>
      <div class="table__cell">Store Name</div>
      <div class="table__cell">Street</div>
      <div class="table__cell">City</div>
      <div class="table__cell">State</div>
      <div class="table__cell">Actions</div>
    </div>
    @if (count($stores) > 0)
    @foreach ($stores as $store)
    <div class="table__row">
      <div class="table__cell">
        <img class="table__crypto-image" alt="" src="https://www.cryptoder.com/assets/img/bitcoin-logo.png" height="32">
        <h3 class="table__crypto-name">{{ $store->id }}
          <h3>
      </div>
      <div class="table__cell">{{ $store->name }}</div>
      <div class="table__cell">{{ $store->location->street }}</div>
      <div class="table__cell">{{ $store->location->city }}</div>
      <div class="table__cell">{{ $store->location->state }}</div>
      <div class="table__cell">
        <div class="buttons">
            <button class="button button--outline buttons__venta">
        <a href="{{ route('stores.edit', $store->id) }}">Edit</a>
</button>
          <form action="{{ route('stores.destroy', $store->id) }}" method="POST" class="store-action-form">
                                @csrf
                                @method('DELETE')
                                <button class="button button--primary buttons__comprar">Delete</button>
                            </form>

        </div>
      </div>
    </div>
   @endforeach
   @else
 <a href="{{ route('stores.create') }}" class="btn btn-primary">Add Store</a>
        <p>No stores found.</p>
    @endif
  </div>
</div>
@endsection
