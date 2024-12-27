@extends('layouts.master')
@section('content')
    <div class="container">
        <h4 class="my-4">User Update</h4>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            {{ method_field('PATCH') }}
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name"
                        value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Your Email"
                        value="{{ $user->email }}" />
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="Phone" class="form-control" id="phone"
                        placeholder="Enter Your Phone" value="{{ $user->phone }}"/>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" class="form-control" id="address"
                        placeholder="Enter Your Address" value="{{ $user->address }}"/>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">+ Update</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
@endsection
