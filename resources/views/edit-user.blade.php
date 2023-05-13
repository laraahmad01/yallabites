@extends('layouts.admin')

@section('content')
    <h2>Edit User</h2>

    <form action="{{ route('roles.updateUser', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">User Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" readonly>
        </div>

        <div class="form-group">
            <label for="email">User Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" readonly>
        </div>

        <div class="form-group">
            <label>Roles:</label>
            <div>
                @foreach ($roles as $role)
                    <div>
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                               {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label>{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
