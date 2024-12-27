@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit Category
            </div>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <input type="text" value="{{ $category->name }}" name="name" class="form-control card-body" />
                </div>
                <div class="card-body">
                    <img src="{{ asset('categoryImages/' . $category->image) }}" alt="{{ $category->image }}"
                        style="width: 50px; height: 50px" />
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                </div>

            </form>
        </div>
    </div>
@endsection
