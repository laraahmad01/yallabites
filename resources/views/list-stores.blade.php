@extends('layouts.admin')

@section('content')
<style>
    .store-table {
    width: 100%;
    border-collapse: collapse;
}

.store-table th,
.store-table td {
    padding: 10px;
    border: 1px solid #ccc;
}

.store-action-btn {
    display: inline-block;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

.store-action-form {
    display: inline-block;
    margin-left: 10px;
}

.store-action-btn:hover {
    background-color: #0056b3;
}

.btn-primary {
    display: inline-block;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

</style>
    <h2>List of Stores</h2>

    @if (count($stores) > 0)
        <table class="store-table">
            <thead>
                <tr>
                    <th>Store ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td>{{ $store->id }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->location }}</td>
                        <td>
                            <!-- Add actions like edit and delete for each store -->
                            <!-- Example: -->
                            <a href="{{ route('stores.edit', $store->id) }}" class="store-action-btn">Edit</a>
                            <form action="{{ route('stores.destroy', $store->id) }}" method="POST" class="store-action-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="store-action-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No stores found.</p>
    @endif
    <a href="{{ route('stores.create') }}" class="btn btn-primary">Add Store</a>
@endsection
