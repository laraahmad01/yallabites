@extends('layouts.admin')

@section('content')
<h1>Roles</h1>

<a href="{{ route('roles.create') }}">Create New Role</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>
                <a href="{{ route('roles.show', $role) }}">View</a>
                <a href="{{ route('roles.edit', $role) }}">Edit</a>
                <form action="{{ route('roles.destroy', $role) }}" method="POST">
@csrf
@method('DELETE')
<button type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>

</table>

@endsection