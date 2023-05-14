@extends('layouts.app')
@section('content')
@if (!Auth::check())
        <script>window.location = "{{ route('login') }}";</script>
    @else
    <style>
      /* Modern CSS styles for the form */
      form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-family: Arial, sans-serif;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
  text-align: center;
}

label {
  display: block;
  margin-bottom: 8px;
}

input,
select {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
  font-size: 16px;
  font-family: Arial, sans-serif;
}

button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0069d9;
}

    </style>

  
  <form method="post" action="{{ route('review', ['store_id' => $store_id]) }}">
        @csrf
      <h1>Review </h1>
      <label for="description">description</label>
      <input type="description" id="description" name="description" required>

      <label for="rating">Rating</label>
      <select id="rating" name="rating">
        <option value="1">Rating</option>
        <option value="1">1 star</option>
        <option value="2">2 stars</option>
        <option value="3">3 stars</option>
        <option value="4">4 stars</option>
        <option value="5">5 stars</option>
      </select>

    
      <button type="submit">Save</button>
    </form>
@endif
@endsection
