@extends('layouts.front')
@section('title','Reset password')
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
            <form class="form-signin" role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email address" required>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <input id="password" type="password" class="form-control" name="password" placeholder="New Password" required>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Reset Password</button>
            </form>
            <a href="{{ url('login') }}" class="forgot-password">
            Login
            </a>
        </div>
    </div>
</div>
@endsection