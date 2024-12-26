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
            Create Category
        </div>
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <label for="name" class="form-control mb-2">NAME: </label>
                <input type="text" placeholder="Enter Category Name" name="name" class="form-control" />
            </div>
            <div class="card-body">
                <label for="image" class="form-control mb-2">IMAGE: </label>
                <input type="file" class="form-control" name="image" />
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    +Create
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
