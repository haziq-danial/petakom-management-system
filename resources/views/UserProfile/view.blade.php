@extends('dashboard')
@section('content')
<div class="row mt-4">
    <div class="col-md-11">  
        <div class="card">
            <div class="card-header">My Profile</div>
            <div class="card-body">
                <form method="#" action="#">
                    @csrf
                    <div class="form-group mb-3">
                        <label>ID:</label>
                        <label>{{ Auth::user()->umpid }}</label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Name:</label>
                        <label>{{ Auth::user()->name }}</label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email:</label>
                        <label>{{ Auth::user()->email }}<label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Phone Number:</label>
                        <label>{{ Auth::user()->phone }}<label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Address:</label>
                        <label>{{ Auth::user()->address }}<label>
                    </div>
                    <div class="form-group mb-3">
                        <a class="btn btn-primary d-inline" href="{{ route('edit') }}">Edit</a>
                        <a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection