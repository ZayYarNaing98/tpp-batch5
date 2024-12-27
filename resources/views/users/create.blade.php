@extends('layouts.master')
@section('content')
    <div class="container">
        <h4 class="my-4">+ User Create</h4>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" id="email"
                        placeholder="Enter Your Email" />
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" class="form-control" id="phone"
                        placeholder="Enter Your Phone" />
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" class="form-control" id="address"
                        placeholder="Enter Your Address" />
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" name="password" class="form-control" id="password"
                        placeholder="Enter Your Password" />
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="text" name="password_confirmation" class="form-control" id="password_confirmation"
                        placeholder="Enter Your Password Confirmation" />
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">+Create</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
@endsection
