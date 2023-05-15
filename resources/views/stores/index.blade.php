@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/storeslist.css') }}">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<div id="app" class="container">

  @foreach ($stores as $store)
  <a href="{{ route('stores.show_menu', $store->id) }}">           
  <card data-image="{{ $store->image }}">
      <h1 slot="header">{{ $store->name }}</h1>
      <p slot="content">{{ $store->description }}</p>
    </card>
</a>
  @endforeach
</div>
<script src="{{ asset('js/storeslist.js') }}"></script>
@endsection
