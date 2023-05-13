@extends('layouts.admin')

@section('content')
    <h2>Edit Store</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stores.update', $store->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $store->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $store->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Store</button>
    </form>
@endsection
