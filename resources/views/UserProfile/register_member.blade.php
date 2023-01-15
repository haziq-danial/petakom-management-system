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
            <div class="card-header">Add Member</div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.member_register') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label><b>Member ID</b></label>
                        <input type="text" name="umpid" class="form-control" placeholder="Member ID" />
                        @if($errors->has('umpid'))
                        <span class="text-danger">{{ $errors->first('umpid')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label><b>Select Role:</b></label>
                        <select id="role" name="role">
                            <option name="role" selected>Student</option>
                            <option name="role" >Lecturer</option>
                            <option name="role" >Dean</option>
                            <option name="role" >PETAKOM Committee</option>
                            <option name="role" >Head of Student Development</option>
                        </select>
                        @if($errors->has('role'))
                        <span class="text-danger">{{ $errors->first('role') }}</span>
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