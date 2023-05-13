@extends('layouts.admin')

@section('content')
<h1>Role Details</h1>

<div>
    <h2>Role Name: {{ $role->name }}</h2>
</div>

<a href="{{ route('roles.edit', $role) }}">Edit</a>
<form action="{{ route('roles.destroy', $role) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>


@endsection
