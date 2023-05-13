@extends('layouts.admin')

@section('content')
<h1>Store Requests</h1>

<table>
    <thead>
        <tr>
            <th>Store Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
        <tr>
            <td>{{ $store->name }}</td>
            <td>{{ $store->description }}</td>
            <td>
                <form action="{{ route('roles.acceptStore', $store->id) }}" method="POST">
                    @csrf
                    <button type="submit">Accept</button>
                </form>
                <form action="{{ route('roles.rejectStore', $store->id) }}" method="POST">
                    @csrf
                    <button type="submit">Reject</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection