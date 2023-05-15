@extends('layouts.admin')

@section('content')
    <style>
        /* forms.css */

.form-container {
    max-width: 400px;
    margin: 0 auto;
    margin-left:8px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.btn {
    padding: 8px 16px;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    background-color: #16a083;
    color: #fff;
    cursor: pointer;
}

.btn:hover {
    background-color: #0d6350;
}
.checkbox-group {
    margin-top: 5px;
}

.checkbox-item {
    margin-bottom: 10px;
}

.checkbox-item input[type="checkbox"] {
    display: none;
}

.checkbox-item label {
    position: relative;
    padding-left: 25px;
    cursor: pointer;
}

.checkbox-item label:before {
    content: "";
    position: absolute;
    left: 0;
    top: 1px;
    width: 18px;
    height: 18px;
    border: 2px solid #ccc;
    border-radius: 4px;
}

.checkbox-item input[type="checkbox"]:checked + label:before {
    background-color: #007bff;
    border-color: #007bff;
}

.checkbox-item label:after {
    content: "";
    position: absolute;
    display: none;
}

.checkbox-item input[type="checkbox"]:checked + label:after {
    display: block;
}

.checkbox-item label:after {
    left: 6px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid #fff;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}




    </style>

    <div class="form-container">
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
    <div class="checkbox-group">
        @foreach ($roles as $role)
            <div class="checkbox-item">
                <input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}"
                    {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                <label for="role_{{ $role->id }}">{{ $role->name }}</label>
            </div>
        @endforeach
    </div>
</div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
