@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="mb-4">Product Lists</h1>
    @can('productCreate')
        <a href="{{ route('products.create') }}" class="btn btn-outline-success mb-4">+ Create</a>
    @endcan
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="bg-primary text-white">ID</th>
                <th class="bg-primary text-white">NAME</th>
                <th class="bg-primary text-white">DESCRIPTION</th>
                <th class="bg-primary text-white">IMAGE</th>
                <th class="bg-primary text-white">PRICE</th>
                <th class="bg-primary text-white">CATEGORY</th>
                <th class="bg-primary text-white">STATUS</th>
                <th class="bg-primary text-white">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $data)
            {{-- {{ dd($data) }} --}}
                <tr>
                    <th>{{ $data['id'] }}</th>
                    <th>{{ $data['name'] }}</th>
                    <th>{{ $data['description'] }}</th>
                    <th><img src="{{ asset('productImages/' . $data->image) }}" alt="{{ $data->image }}"
                            style="width:50px; height:50px" /></th>
                            <th>{{ $data['price'] }}</th>
                            <th>{{ $data['category']['name'] }}</th>
                    <th>
                        @if ($data->status === 1)
                            <span class="text-success">Active</span>
                        @else
                            <span class="text-danger">Suspend</span>
                        @endif
                    </th>
                    <th class="d-flex">
                        @can('productEdit')
                        <a href="{{ route('products.edit', ['id' => $data->id]) }}"
                                class="btn btn-outline-secondary me-2">Edit</a>
                        @endcan
                        @can('productDelete')
                            <form action="{{ route('products.delete', $data->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        @endcan
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
