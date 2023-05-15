@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
<div class="fontclass">
    <button class="button button--primary buttons__delete">
<a href="{{ route('roles.create') }}">Create New Role</a>
</button>
  <div class="table">
    <div class="table__body">
      <div class="table__row table__heading">
        <div class="table__cell">Role Name</div>
        <div class="table__cell">Actions</div>
      </div>
      @foreach($roles as $role)
      <div class="table__row">
        <div class="table__cell">{{ $role->name }}</div>
        <div class="table__cell">
          <div class="buttons">
            <button class="button button--primary buttons__view">
              <a href="{{ route('roles.show', $role) }}">View</a>
            </button>
            <button class="button button--outline buttons__edit">
              <a href="{{ route('roles.edit', $role) }}">Edit</a>
            </button>
            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="role-action-form">
              @csrf
              @method('DELETE')
              <button class="button button--primary buttons__delete">Delete</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      @if(count($roles) == 0)
      <p>No roles found.</p>
      @endif
    </div>
  </div>
</div>


@endsection