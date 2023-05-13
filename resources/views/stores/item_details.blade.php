@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/itemsdetails.css') }}">
<div id="app">
    <div class="table">
      <div class="table-cell">
        <div class="card">
          <div class="topInfo">
            <h3>ModHaus</h3>
            <h1>{{ $item->name }}</h1>
            <a :href="'http://www.amazon.com/dp/' + $item->id"> ${{ $item->price }}</a>
          </div>
          <div class="swiper-container">
            <!-- Swiper content goes here -->
          </div>
          <div class="padme">
            <div class="column col1">
              <h2>Product description</h2>
              <p>{{ $item->description }}</p>
            </div>
            <div class="column col2">
              <h2>Product Details</h2>
              <table>
                <tr>
                  <td class="bold">Category</td>
                  <td>{{ $item->category->name }}</td>
                </tr>
                <tr>
                  <td class="bold">Calories</td>
                  <td>{{ $item->calories }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="fadey"></div>
      </div>
    </div>
  </div>
@endsection
