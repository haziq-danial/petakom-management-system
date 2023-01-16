@extends('main')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-4">

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

		<div class="card">
		<div class="card-header">Reset Password</div>
		<div class="card-body">
			<form action="{{ route('user.resetPassword') }}" method="POST">
				@csrf
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email Address" />
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-primary btn-block">Send Reset Password Link</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')