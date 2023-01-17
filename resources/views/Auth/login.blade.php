@extends('main')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-info">
    {{ $message }}
</div>

@endif

<div class="row justify-content-center">
	<div class="col-md-4">

    @if (session()->has('error'))

    <div c;ass="alert alert-danger">
        {{ session()->get('message') }}
    </div>

    @endif
		<div class="card">
			<div class="card-header">Login</div>
			<div class="card-body">
				<form action="{{ route('user.login') }}" method="post">
					@csrf
					<div class="form-group mb-3">
						<input type="text" name="umpid" class="form-control" placeholder="ID" />
						@if($errors->has('umpid'))
							<span class="text-danger">{{ $errors->first('umpid') }}</span>
						@endif
					</div>
					<div class="form-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" />
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="d-grid mx-auto">
						<button type="subit" class="btn btn-primary btn-block">Login</button>
					</div>
				</form>
				<a class="row justify-content-center" href="{{ route('indexForgotPassword') }}">Forgot Password</a>
			</div>
		</div>
	</div>
</div>

@endsection('content')