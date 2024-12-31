@extends('layouts.master')
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mt-4">
        <div class="card-header">
            Create Permission
        </div>
        <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <label for="name" class="form-label">NAME :</label>
                <input type="text" name="name" placeholder="Enter Role Name" class="form-control">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary me-2">+Create</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
