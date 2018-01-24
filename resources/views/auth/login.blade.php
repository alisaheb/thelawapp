@extends('layouts.front')
@section('title','The law app')
@section('content')
<div class="container-fluid login">
	<div class="row">
		<div class="card card-container">
			@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
			<div class="loglogo">
				{{ Html::image('assets/front/img/logo.png','logo',['id'=>'profile-img','class'=>'sitelogo-img'])}}
			</div>
			<form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					@if ($errors->has('email'))
					<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
				<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					@if ($errors->has('password'))
					<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>
				<input id="password" type="password" class="form-control" name="password" required>
				<div id="remember" class="checkbox">
					<label>
					<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
			</form>
			<a href="password/reset" class="forgot-password">
			Forgot the password?
			</a>
			<a href="register" class="forgot-password">
			Create an account
			</a>
		</div>
	</div>
</div>
@endsection