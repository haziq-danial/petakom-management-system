@extends('dashboard')
@section('content')
<div class="row mt-4">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="col-md-11">  
        <div class="card">
            <div class="card-header">Edit User</div>
            <div class="card-body">
                <form method="post" action="{{ route('user.edit_validation') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label><b>UMP ID</b></label>
                        <input disabled type="text" name="umpid" class="form-control" placeholder="Full Name" value="{{ $data->umpid }}"/>
                        <input type="hidden" name="umpid" value="{{ $data->umpid }}"/>
                        @if($errors->has('umpid'))
                        <span class="text-danger">{{ $errors->first('umpid')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label><b>Email</b></label>
                        <input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ $data->email }}"/>
                        @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label><b>Name</b></label>
                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ $data->name }}"/>
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label><b>Phone Number</b></label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ $data->phone }}"/>
                        @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label><b>Address</b></label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $data->address }}"/>
                        @if($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="Save"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection