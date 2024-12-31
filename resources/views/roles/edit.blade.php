@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit Role
            </div>
            {{-- {{dd($role)}} --}}
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                    <input type="text" name="name" value="{{ $role->name }}" class=" form-control card-body" />
                </div>
                <div class="card-body">
                    @foreach ($permissions as $permission)
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                    value="{{ $permission->id }}" id="permission{{ $permission->id }}"
                                    @if (in_array($permission->id, $rolePermissions)) checked @endif>
                                <label class="form-check-label" for="permission{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
