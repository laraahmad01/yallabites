@extends('layouts.admin')
@section('content')
<style>
    .assign-role-container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f5f5f5;
  border-radius: 5px;
  margin-left:0px;
}

.assign-role-heading {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.assign-role-form {
  display: flex;
  flex-direction: column;
}

.assign-role-group {
  margin-bottom: 20px;
}

.assign-role-label {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
}

.assign-role-select {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.assign-role-button {
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  background-color: #16a083;
  color: white;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
}

.assign-role-button:hover {
  background-color: #0d6350;
}

.alert-danger {
  color: #721c24;
  background-color: #0d6350;
  border-color: #f5c6cb;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
}

.alert-danger ul {
  margin: 0;
  padding: 0;
}

.alert-danger li {
  list-style: none;
}


</style>
@extends('layouts.admin')

@section('content')
    <div class="assign-role-container">
        <h2 class="assign-role-heading">Assign Role to User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('roles.assign') }}" method="POST" class="assign-role-form">
            @csrf

            <div class="assign-role-group">
                <label for="role_id" class="assign-role-label">Select Role:</label>
                <select name="role_id" id="role_id" class="assign-role-select">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="assign-role-group">
                <label for="user_id" class="assign-role-label">Select User:</label>
                <select name="user_id" id="user_id" class="assign-role-select">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="assign-role-button">Assign Role</button>
        </form>
    </div>
@endsection
