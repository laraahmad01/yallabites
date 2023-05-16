@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/createrole.css') }}">

<div class="role-create-container">
  <h1 class="role-create-heading">Create Role</h1>

  <form class="role-create-form" action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="role-create-input-group">
      <label class="role-create-label" for="name">Role Name:</label>
      <input class="role-create-input" type="text" name="name" id="name" required>
    </div>
    <button class="role-create-button" type="submit">Create</button>
  </form>
</div>
@endsection
