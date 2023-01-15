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
		<div class="card-header">Reset Password</div>
		<div class="card-body">
			<form action="{{ route('password.update') }}" method="POST">
				@csrf
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ $data->email }}" />
                    <input type="hidden" name="email" value="{{ $data->email }}"/>
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
                <div class="form-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="New Password" />
					@if($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>
                <div class="form-group mb-3">
					<input type="password" name="confirmPassword" class="form-control" placeholder="Re-type New Password" />
					@if($errors->has('confirmPassword'))
						<span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
					@endif
				</div>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')