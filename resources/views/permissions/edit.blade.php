@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit Permission
            </div>
            {{-- {{ dd($permission) }} --}}
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                    <input type="text" name="name" value="{{ $permission->name }}" class=" form-control card-body" />
                </div>
                <div class="card-body">
                    <label for="roles">Assigned Roles</label>
                    <ul>
                        @foreach ($permission->roles as $role)
                            <li>
                                {{ $role->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
