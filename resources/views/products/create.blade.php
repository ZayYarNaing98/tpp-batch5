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
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" placeholder="Enter Product Name" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="description" class="form-label">Description :</label>
                    <input type="text" name="description" placeholder="Enter Product Description"
                        class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="image" class="form-label">IMAGE :</label>
                    <input type="file" name="image" class="form-control" id="image" />
                </div>
                <div class="card-body">
                    <label for="price" class="form-label">Price :</label>
                    <input type="text" name="price" placeholder="Enter Product Price" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="category" class="form-label">Select Your Category</label>
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-body">
                    <div class="form-check from-switch">
                        <label for="status" class="form-check-label">Active Or Inactive</label>
                        <input type="checkbox" class="form-check-input" name="status" role="switch" checked />
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">+Create</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
