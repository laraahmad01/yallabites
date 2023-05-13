@extends('layouts.admin')

@section('content')
<h1>Edit Role</h1>

<form action="{{ route('roles.update', $role) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Role Name:</label>
        <input type="text" name="name" id="name" value="{{ $role->name }}" required>
    </div>
    <button type="submit">Update</button>
</form>
@endsection
