@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}">

    <div class="fontclass">
        <div class="table">
            <div class="table__body">
                <div class="table__row table__heading">
                    <div class="table__cell">User ID</div>
                    <div class="table__cell">Username</div>
                    <div class="table__cell">Email</div>
                    <div class="table__cell">Role</div>
                    <div class="table__cell">Actions</div>
                </div>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <div class="table__row">
                            <div class="table__cell">{{ $user->id }}</div>
                            <div class="table__cell">{{ $user->name }}</div>
                            <div class="table__cell">{{ $user->email }}</div>
                            <div class="table__cell">
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            </div>
                            <div class="table__cell">
                                <div class="buttons">
                                    <button class="button button--outline buttons__venta">
                                        <a href="{{ route('roles.editUser', $user->id) }}">Edit Role</a>
                                    </button>
                                    <form action="{{ route('roles.deleteUserRole', $user->id) }}" method="POST"
                                        class="store-action-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button button--primary buttons__comprar">Delete Role</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <a href="{{ route('stores.create') }}" class="btn btn-primary">Add Store</a>
                    <p>No stores found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
