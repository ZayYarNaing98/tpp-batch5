@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="mb-4">Role Lists</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-outline-success mb-4">+ Create</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="bg-primary text-white">ID</th>
                <th class="bg-primary text-white">NAME</th>
                <th class="bg-primary text-white">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $data)
                <tr>
                    <th>{{ $data['id'] }}</th>
                    <th>{{ $data['name'] }}</th>

                    <th class="d-flex">
                        <a href="{{ route('roles.edit', ['role' => $data->id]) }}"
                            class="btn btn-outline-secondary me-2">Edit</a>
                        <form action="{{ route('roles.destroy', $data->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="btn btn-outline-danger">Delete</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
