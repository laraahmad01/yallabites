@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/itemsdetails.css') }}">
<div id="app">
    <div class="table">
    
        <div class="card">
        <div class="infoimg" style="display: flex; align-items: center;margin-top: -25px;
    margin-left: -10px;">
  <div class="img" style="flex: 0 0 120px; margin-right: 10px; ">
    <img src="{{$item->image}}" style="width:309px; height:245px">
  </div>
  <div class="topInfo" style="flex: 1;     margin-left: 14px;
    margin-top: -72px;">
    <h3>{{$item->menu->store->name}}</h3>
    <h1>{{ $item->name }}</h1>
    <a :href="'http://www.amazon.com/dp/' + $item->id"> ${{ $item->price }}</a>
  </div>
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
        <div class="fadey"></div>
      </div>
    </div>

  </div>
@endsection
