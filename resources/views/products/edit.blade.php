@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit Product
            </div>
            {{-- {{dd($product)}} --}}
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" class="form-control card-body" value="{{ $product->name }}" />
                </div>
                <div class="card-body">
                    <label for="description" class="form-label">Description :</label>
                    <input type="text" name="description" class="form-control card-body"
                        value="{{ $product->description }}" />
                </div>
                <div class="card-body">
                    <label for="price" class="form-label">Price :</label>
                    <input type="text" name="price" class="form-control card-body" value="{{ $product->price }}" />
                </div>
                <div class="card-body">
                    <label for="image" class="form-label">Image :</label>
                    <img src="{{ asset('productImages/' . $product->image) }}" alt="{{ $product->image }}"
                        style="width:100px; height:100px" />
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Active or Inactive</label>
                        <input class="form-check-input" name="status" type="checkbox" role="switch"
                            {{ $product->status === 1 ? 'checked' : '' }} />
                    </div>
                </div>
                <div class="card-body">
                    <label for="category" class="form-label">Select Your Category</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
