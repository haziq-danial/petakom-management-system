@extends('main')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-4">

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

		<div class="card">
		<div class="card-header">Registration (For Coordinator Only)</div>
		<div class="card-body">
			<form action="{{ route('staff.register') }}" method="POST">
				@csrf
				<div class="form-group mb-3">
					<input type="text" name="umpid" class="form-control" placeholder="Staff ID" />
					@if($errors->has('umpid'))
						<span class="text-danger">{{ $errors->first('umpid') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email Address" />
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="Password" />
					@if($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-primary btn-block">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')